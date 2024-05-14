<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_orders.css">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <?php
    // Include config file
    require_once "config.php";

    // Check if the session user_id is set
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        // Query to fetch orders for the current user with order details separated by status and ordered by status
        $query_user_orders = "SELECT o.id AS order_id, o.status, o.price AS order_price, GROUP_CONCAT(CONCAT(f.name, ' (Quantity: ', of.quantity, ')') SEPARATOR '<br>') AS food_items
                            FROM `order` o
                            LEFT JOIN `order_food` of ON o.id = of.order_id
                            LEFT JOIN `food` f ON of.food_id = f.id
                            WHERE o.user = ?
                            GROUP BY o.id, o.status
                            ORDER BY o.status";

        // Prepare the statement
        if ($stmt = mysqli_prepare($conn, $query_user_orders)) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            // Execute the statement
            mysqli_stmt_execute($stmt);
            // Get the result
            $result_user_orders = mysqli_stmt_get_result($stmt);

            // Check if there are any orders
            if (mysqli_num_rows($result_user_orders) > 0) {
                // Initialize variables to track current status
                $current_status = "";
                ?>
                <!-- Main content -->
                <div class="content">
                    <h1>My Orders</h1>
                    <div class="orders">
                <?php
                // Loop through each order
                while ($row = mysqli_fetch_assoc($result_user_orders)) {
                    // Check if the status has changed
                    if ($current_status != $row['status']) {
                        // If so, start a new section
                        if ($current_status != "") {
                            // Close the previous section
                            echo "</div>"; // Close the orders div
                            echo "</div>"; // Close the content div
                        }
                        // Start a new section for the current status
                        ?>
                        <div class="content">
                            <h2><?php echo $row['status']; ?> Orders</h2>
                            <div class="orders">
                        <?php
                        // Update current status
                        $current_status = $row['status'];
                    }
                    ?>
                    <div class="order">
                        <h3>Order ID: <?php echo $row['order_id']; ?></h3>
                        <p>Food Items: <?php echo $row['food_items']; ?></p>
                        <p>Total Price: Rs. <?php echo $row['order_price']; ?></p>
                    </div>
                    <?php
                }
                // Close the last section
                echo "</div>"; // Close the orders div
                echo "</div>"; // Close the content div
                ?>
                </div>
                </div>
                <!-- End Main content -->
                <?php
            } else {
                echo "No orders found.";
            }
        } else {
            echo "Error preparing the statement: " . mysqli_error($conn);
        }
    } else {
        echo "Session user_id is not set.";
    }
    ?>

</body>
</html>
