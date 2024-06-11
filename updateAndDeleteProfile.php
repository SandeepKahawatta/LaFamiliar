<?php
require "config.php";

if(isset($_POST['updateprofile'])){

    $new_firstname = $_POST['fname'];
    $new_lasttname = $_POST['lname'];
    $new_email = $_POST['email'];
    $new_phone = $_POST['phonenumber'];
    $new_password = $_POST['password'];
    $id = $_POST['id'];
    $new_address = $_POST['address'];

    $sql = "UPDATE user
    SET phone = '$new_phone',
        first_name = '$new_firstname',
        last_name = '$new_lasttname',
        email = '$new_email',
        password = '$new_password',
        address = '$new_address'
    WHERE id = '$id'";

    if($conn -> query($sql)){

        header("Location:profile.php?update=update successfully!");
        exit();
    }else{
        header("Location:profile.php?update=Failed! try again");
        exit();
    }
}

if(isset($_POST['deleteaccount'])){

    $id = $_POST['id'];

    $sql_d = "DELETE FROM user WHERE id = '$id'";

    if($conn->query($sql_d)){
        header("Location:login.php");
        exit();
    }else{
        echo "Failed! try again";
    }
}
?>