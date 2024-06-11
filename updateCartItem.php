<?php
require "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST" ){

    $cartId = $_POST['cart_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $total = $quantity * $price;

    $sql = "UPDATE cart
    SET quantity = '$quantity',
    total = '$total'
    WHERE id = '$cartId'";

    if($conn -> query($sql)){

        header("Location:cart.php?update=update successfully!");
        exit();
    }else{
        header("Location:cart.php?update=Failed! try again");
        exit();
    }
}


?>