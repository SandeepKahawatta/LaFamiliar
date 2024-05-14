<?php
// Include config file
require_once "config.php";

// Query pending orders
$query_pending = "SELECT * FROM `order` WHERE status = 'Pending'";
$result_pending = mysqli_query($conn, $query_pending);

// Query approved orders
$query_approved = "SELECT * FROM `order` WHERE status = 'Approved'";
$result_approved = mysqli_query($conn, $query_approved);

// Query rejected orders
$query_rejected = "SELECT * FROM `order` WHERE status = 'Rejected'";
$result_rejected = mysqli_query($conn, $query_rejected);
?>

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

    <?php include 'staffNavbar.php'; ?> 
    
    <!-- Staff Orders Section -->
    <div class="content">
        <h1>Staff Orders</h1>

        <!-- Display pending orders -->
        <h2>Pending Orders</h2>
        <?php if(mysqli_num_rows($result_pending) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result_pending)): ?>
                <div class="order">
                    <h3>Order ID: <?php echo $row['id']; ?></h3>
                    <p class="total-amount">Total Amount: Rs. <?php echo $row['price']; ?></p>
                    <div class="buttons">
                        <a href="processApproveOrder.php?id=<?php echo $row['id']; ?>" class="approve-button">Approve</a>
                        <a href="processRejectOrder.php?id=<?php echo $row['id']; ?>" class="reject-button">Reject</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No pending orders found.</p>
        <?php endif; ?>

        <!-- Display approved orders -->
        <h2>Approved Orders</h2>
        <?php if(mysqli_num_rows($result_approved) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result_approved)): ?>
                <div class="order">
                    <h3>Order ID: <?php echo $row['id']; ?></h3>
                    <p class="total-amount">Total Amount: Rs. <?php echo $row['price']; ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No approved orders found.</p>
        <?php endif; ?>

        <!-- Display rejected orders -->
        <h2>Rejected Orders</h2>
        <?php if(mysqli_num_rows($result_rejected) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result_rejected)): ?>
                <div class="order">
                    <h3>Order ID: <?php echo $row['id']; ?></h3>
                    <p class="total-amount">Total Amount: Rs. <?php echo $row['price']; ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No rejected orders found.</p>
        <?php endif; ?>

    </div>
    <!-- End Staff Orders Section -->

</body>
</html>
