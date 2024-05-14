<?php
require "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST" ){

    $cartId = $_POST['cart_id'];

    $sql = "DELETE FROM cart WHERE id = '$cartId'";

    if($conn -> query($sql)){

        header("Location:cart.php?delete=delete successfully!");
        exit();
    }else{
        header("Location:cart.php?delete=Failed! try again");
        exit();
    }
}


?>