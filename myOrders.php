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

    <?php include 'navbar.php'; 
    if(isset($_SESSION['user_id'])){

        $user_id = $_SESSION['user_id'];
    }
    ?>

    <?php
    // Include config file
    require_once "config.php";

    if(isset($_SESSION['user_id'])){

        $user_id = $_SESSION['user_id'];
    }

    // Query to fetch orders for the current user
    $sql = "SELECT * FROM `order` WHERE `user` = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind the user ID parameter
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        // Execute the statement
        mysqli_stmt_execute($stmt);
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
    }

    ?>


    <!-- Main content -->
    <div class="content">
        <h1>My Orders</h1>
        <div class="orders">
            <?php
            // Check if there are any orders
            if (mysqli_num_rows($result) > 0) {
                // Loop through each order
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="order">
                        <h2>Order ID: <?php echo $row['id']; ?></h2>
                        <p>Price: Rs. <?php echo $row['price']; ?></p>
                        <p>Notes: <?php echo $row['notes']; ?></p>
                        <p>Card Number: <?php echo $row['card_number']; ?></p>
                        <!-- Add more order details here as needed -->
                    </div>
                    <?php
                }
            } else {
                echo "No orders found.";
            }
            ?>
        </div>
    </div>
    <!-- End Main content -->

</body>
</html>
