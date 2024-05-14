<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitlog'])) {

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $rePassword = $_POST['re-password'];

    if($password === $rePassword){ // to check the password are match.
        $sql = "INSERT INTO user (email, phone, first_name, last_name, address, password)
            VALUES ('$email' , '$phone' , '$first_name' , '$last_name' , '$address' , '$password')";

        if ($conn -> query($sql) == TRUE) {
            header("Location:login.php?now log in");
            exit();
        } else {
            $message = "Error: " .$sql. "<br>" .$conn -> error;
            header("Location:login.php?error=".$message);
            exit();
        }
    }else {
        header("Location:login.php?error=password missmatch");
        exit();
    }

}

?>