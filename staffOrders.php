<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_card_type1.css">
    <link rel="stylesheet" href="style/style_card_type2.css">
    <link rel="stylesheet" href="style/style_location.css">
    <link rel="stylesheet" href="style/style_review.css">
    <link rel="stylesheet" href="style/style_footer.css">
    <link rel="stylesheet" href="style/style_staffOrders.css">
    <link rel="icon" type="image/X-icon" href="images/logo/Secondary Logo.png">
    <title>LaFamiliar.com</title>
</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="images/logo/Primary Logo.png" alt="Logo" width="250px" height="100px">  
            </div>
            <ul class="links">
                <li class="nav"><a class="nav_a" href="staffHome.php"><b>Home</b></a></li>
                <li class="nav"><a class="nav_a" href="staffOrders.php"><b>Orders</b></a></li>
                <li class="nav"><a class="nav_a" href="staffAllFood.php"><b>Manage Food</b></a></li>
            </ul>
            <div class="shortcut">
                <div class="profile-img">
                    <a href="profile.php" ><img src="images\user\profile.png" width="30px" height="30px" ></a>
                </div>
            </div>
        </div>
    </header>
    <!-- End Navigation Bar -->
    
    <!-- Staff Orders Section -->
    <div class="content">
        <h1>Staff Orders</h1>
        <!-- PHP code to display orders -->
        <?php
        // Include config file
        require_once "config.php";

        // Query to retrieve orders from the database
        $query = "SELECT * FROM `order`";
        $result = mysqli_query($conn, $query);

        // Check if any orders are found
        if(mysqli_num_rows($result) > 0) {
            // Iterate over each order and display its details
            // Iterate over each order and display its details
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="order">
                        <h2>Order ID: <?php echo $row['id']; ?></h2>
                        <!-- Additional order details -->
                        <p class="total-amount">Total Amount: Rs. <?php echo $row['price']; ?></p>
                        <!-- Add more order details here as needed -->
                        
                        <!-- Approve and reject buttons -->
                        <div class="buttons">
                        <a href="processApproveOrder.php?id=<?php echo $row['id']; ?>" class="approve-button">Approve</a>
                        <a href="processRejectOrder.php?id=<?php echo $row['id']; ?>" class="reject-button">Reject</a>
                    </div>
                    </div>
                    <?php
                }

        } else {
            // If no orders found, display a message
            echo "<p>No orders found in the database.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
    <!-- End Staff Orders Section -->

</body>
</html>
