
<?php
session_start();
require "config.php";

$user = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {

    $food = $_POST['food_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['food_price'];

    $total = $price * $quantity;

    $sql = "INSERT INTO cart (user, food, quantity, total)
        VALUES ('$user', '$food' , '$quantity', '$total')";

    if ($conn -> query($sql) == TRUE) {
        header("Location:cart.php?now log in");
        exit();
    } else {
        $message = "Error: " .$sql. "<br>" .$conn -> error;
        header("Location:login.php?error=".$message);
        exit();
    }

}

?>