<?php
session_start();
require "config.php";

// Define variables to store error messages
$name_err = $description_err = $price_err = $image_err = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the food ID from the form
    $foodId = $_POST['food_id'];

    // Validate and sanitize form inputs
    $foodName = trim($_POST['name']);
    $foodDescription = trim($_POST['description']);
    $foodPrice = trim($_POST['price']);

    // Check if name is empty
    if (empty($foodName)) {
        $name_err = "Please enter the food name.";
    }

    // Check if description is empty
    if (empty($foodDescription)) {
        $description_err = "Please enter the food description.";
    }

    // Check if price is empty
    if (empty($foodPrice)) {
        $price_err = "Please enter the food price.";
    } elseif (!is_numeric($foodPrice)) {
        $price_err = "Please enter a valid price.";
    }

    // Check if there are no errors
    if (empty($name_err) && empty($description_err) && empty($price_err)) {
        // Check if an image file is uploaded
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Get file details
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];

            // Move uploaded file to the uploads directory
            $upload_path = "images/cards/"; // Change this to your desired upload directory
            $new_file_name = $upload_path . $file_name;

            // Check if the file is an image
            if ($file_type === "image/jpeg" || $file_type === "image/png" || $file_type === "image/gif") {
                // Move the uploaded file to the destination directory
                if (move_uploaded_file($file_tmp, $new_file_name)) {
                    // Update food details in the database
                    $update_query = "UPDATE food SET name='$foodName', description='$foodDescription', price='$foodPrice', image='$file_name' WHERE id='$foodId'";
                    if (mysqli_query($conn, $update_query)) {
                        // Food updated successfully, redirect to manage foods page
                        header("Location: staffAllFood.php?message=Food updated successfully");
                        exit;
                    } else {
                        // Error updating food details in the database
                        echo "Error updating food details: " . mysqli_error($conn);
                    }
                } else {
                    // Error moving uploaded file
                    $image_err = "Error uploading image file.";
                }
            } else {
                // Invalid file type
                $image_err = "Invalid file type. Please upload only JPG, PNG, or GIF files.";
            }
        } else {
            // Update food details in the database without changing the image
            $update_query = "UPDATE food SET name='$foodName', description='$foodDescription', price='$foodPrice' WHERE id='$foodId'";
            if (mysqli_query($conn, $update_query)) {
                // Food updated successfully, redirect to manage foods page
                header("Location: staffAllFood.php?message=Food updated successfully");
                exit;
            } else {
                // Error updating food details in the database
                echo "Error updating food details: " . mysqli_error($conn);
            }
        }
    }
}
?>
