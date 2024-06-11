<?php
// Include the config file
require_once "config.php";

// Check if form is submitted
if(isset($_GET['id'])){
   
        $order_id = $_GET["id"];

            // Update the order status to "Approved"
            $sql = "UPDATE `order` SET status = 'Approved' WHERE id = '$order_id'";


        // Execute the SQL query
        if (mysqli_query($conn, $sql)) {
            // Redirect back to the staff orders page with a success message
            header("Location: staffOrders.php?message=Order status updated successfully");
            exit;
        } else {
            // Redirect back to the staff orders page with an error message
            header("Location: staffOrders.php?error=Error updating order status: " . mysqli_error($conn));
            exit;
        }
    
}
?>
