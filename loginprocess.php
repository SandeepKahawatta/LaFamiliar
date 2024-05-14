<?php
session_start();
require "config.php";

if(isset( $_POST["username"]) && isset($_POST["logpassword"])){

    $email = mysqli_real_escape_string($conn, $_POST['username']);
    $log_password = mysqli_real_escape_string($conn, $_POST['logpassword']);


    

    if(empty($email)){
        header("Location:login.php?error=User name is required");
        exit();
    }else if(empty($log_password)){
        header("Location:login.php?error=password is required");
        exit();
    }else{

        $sql1 = "SELECT * FROM user WHERE email = '$email' AND password = '$log_password'";
        $sql2 = "SELECT * FROM staff WHERE email = '$email' AND password = '$log_password'";
        
        $check = $conn->query($sql1);
        $check2 = $conn->query($sql2);

        if($check-> num_rows > 0){
            $data = $check->fetch_assoc();

            if ($data["email"] == $email && $data["password"] == $log_password){
                
                $_SESSION['user_name'] = $data["id"];
            
                header("Location:card.html");
                exit();

            }else{
                header("Location:login.php?error=Incorrect user name or password");
                exit();
            }
           
        }

        else if($check2-> num_rows > 0){
            $data = $check2->fetch_assoc();

            if ($data["email"] == $email && $data["password"] == $log_password){
                
                $_SESSION['user_name'] = $data["id"];
            
                header("Location: staffHome.php");
                exit();

            }else{
                header("Location:login.php?error=Incorrect Email or password");
                exit();
            }
           
        }

    }

}else{
    header("Location: login.php");
    exit();
}






?>