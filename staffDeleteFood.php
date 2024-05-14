<?php
require "config.php";

if(isset($_GET['id'])){

    $foodId = $_GET['id'];

    $sql = "DELETE FROM food WHERE id = '$foodId'";

    if($conn -> query($sql)){

        header("Location:staffAllFood.php?delete=delete successfully!");
        exit();
    }else{
        header("Location:staffAllFood.php?delete=Failed! try again");
        exit();
    }
}


?>