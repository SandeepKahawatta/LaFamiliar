<?php
require_once "config.php";

$name = $description = $price = "";
$name_err = $description_err = $price_err = $image_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name for the food.";
    } else{
        $name = trim($_POST["name"]);
    }

    if(empty(trim($_POST["description"]))){
        $description_err = "Please enter a description for the food.";
    } else{
        $description = trim($_POST["description"]);
    }

    if(empty(trim($_POST["price"]))){
        $price_err = "Please enter the price for the food.";
    } else{
        $price = trim($_POST["price"]);
    }

    if(empty($_FILES["image"]["name"])){
        $image_err = "Please select an image.";
    } else{
        $target_dir = "images/cards/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false) {
            $image_err = "File is not an image.";
        }
        
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $image_err = "Sorry, your file is too large.";
        }
        
        // Allow certain file formats
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if(!in_array($imageFileType, $allowed_types)){
            $image_err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
        
        if (empty($image_err)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO food (name, description, price, image) VALUES (?, ?, ?, ?)";
                
                if($stmt = mysqli_prepare($conn, $sql)){
                    mysqli_stmt_bind_param($stmt, "ssds", $param_name, $param_description, $param_price, $param_image);
                    
                    $param_name = $name;
                    $param_description = $description;
                    $param_price = $price;
                    $param_image = basename($_FILES["image"]["name"]);
                    
                    if(mysqli_stmt_execute($stmt)){
                        header("location: staffManageFoods.php");
                        exit();
                    } else{
                        echo "Something went wrong. Please try again later.";
                    }

                    mysqli_stmt_close($stmt);
                }
            } else {
                $image_err = "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    mysqli_close($conn);
}
?>
