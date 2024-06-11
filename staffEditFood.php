<?php
session_start();
require "config.php";

$name_err = $description_err = $price_err = $image_err = "";

// Check if food ID is provided in the URL
if(isset($_GET['id'])) {
    $foodId = $_GET['id'];

    // Fetch food details from the database based on the food ID
    $query = "SELECT * FROM food WHERE id = '$foodId'";
    $result = mysqli_query($conn, $query);

    // Check if the food exists
    if(mysqli_num_rows($result) > 0) {
        $food = mysqli_fetch_assoc($result);

        // Populate form fields with existing food details
        $foodName = $food['name'];
        $foodDescription = $food['description'];
        $foodPrice = $food['price'];
        // You may need to change the image path depending on where your images are stored
        $foodImage = $food['image'];
    } else {
        // Food not found, handle error or redirect to an error page
        echo "Food not found.";
        exit;
    }
} else {
    // Food ID not provided, handle error or redirect to an error page
    echo "Food ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_footer.css">
    <link rel="stylesheet" href="style/style_staffAddFood.css">
    <link rel="icon" type="image/X-icon" href="images/logo/Secondary Logo.png">
    <title>Edit Food - LaFamiliar.com</title>
</head>
<body>

<?php include 'staffNavbar.php'; ?>  

    <!-- Side Navigation Bar -->
    

    <div class="content">
        <h1>Edit Food</h1>
        <form action="processEditFood.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $foodName; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $foodDescription; ?></textarea>
                <span class="invalid-feedback"><?php echo $description_err; ?></span>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $foodPrice; ?>">
                <span class="invalid-feedback"><?php echo $price_err; ?></span>
            </div>
            <div class="form-group">
                <label>Image</label>
                <img src="images/cards/<?php echo $foodImage; ?>" alt="Food Image" width="100">
                <input type="file" name="image" class="form-control-file <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $image_err; ?></span>
            </div>
            <div class="form-group">
                <input type="hidden" name="food_id" value="<?php echo $foodId; ?>">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="staffAllFood.php" class="btn btn-secondary ml-2">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>
