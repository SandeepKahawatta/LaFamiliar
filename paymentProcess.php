<?php
session_start();
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitPayment'])) {

    $request = $_POST['request'];
    $subTotal = $_POST['subTotal'];
    $cardnumber = $_POST['cardNumber'];

    $userId = $_SESSION['user_id'];

    // Insert order details into the orders table
    $orderSql = "INSERT INTO `order` (`user`, `price`, `notes`, `card_number`)
                 VALUES ('$userId', '$subTotal', '$request', '$cardnumber')";

    if ($conn->query($orderSql) === TRUE) {
        // Retrieve the order ID of the newly inserted order
        $orderId = $conn->insert_id;

        // Retrieve cart items associated with the user
        $cartQuery = "SELECT * FROM cart WHERE user = '$userId'";
        $cartResult = mysqli_query($conn, $cartQuery);

        if (mysqli_num_rows($cartResult) > 0) {
            // Iterate over each cart item
            while ($cartRow = mysqli_fetch_assoc($cartResult)) {
                $foodId = $cartRow['food'];
                $quantity = $cartRow['quantity'];

                // Check if the order-food combination already exists
                $existingOrderFoodSql = "SELECT * FROM order_food WHERE order_id = '$orderId' AND food_id = '$foodId'";
                $existingOrderFoodResult = mysqli_query($conn, $existingOrderFoodSql);

                if (mysqli_num_rows($existingOrderFoodResult) > 0) {
                    // If the combination exists, update the quantity
                    $existingOrderFoodRow = mysqli_fetch_assoc($existingOrderFoodResult);
                    $newQuantity = $existingOrderFoodRow['quantity'] + $quantity;

                    $updateOrderFoodSql = "UPDATE order_food SET quantity = '$newQuantity'
                                           WHERE order_id = '$orderId' AND food_id = '$foodId'";
                    $conn->query($updateOrderFoodSql);
                } else {
                    // If the combination does not exist, insert a new row
                    $insertOrderFoodSql = "INSERT INTO order_food (order_id, food_id, quantity)
                                           VALUES ('$orderId', '$foodId', '$quantity')";
                    $conn->query($insertOrderFoodSql);
                }
            }

            // Delete all cart items associated with the user
            $deleteCartSql = "DELETE FROM cart WHERE user = '$userId'";
            if ($conn->query($deleteCartSql) === TRUE) {
                // Redirect to payment success page or any other page
                header("Location: myOrders.php?message=Payment successful!");
                exit();
            } else {
                $errorMessage = "Error deleting cart items: " . $conn->error;
                header("Location: payment.php?message=$errorMessage");
                exit();
            }
        } else {
            // No cart items found for the user
            header("Location: payment.php?message=Your cart is empty.");
            exit();
        }
    } else {
        $errorMessage = "Error inserting order details: " . $conn->error;
        header("Location: payment.php?message=$errorMessage");
        exit();
    }
}
?>
