<?php
$name_err = $description_err = $price_err = $image_err = "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_footer.css">
    <link rel="stylesheet" href="style/style_staffAddFood.css">
    <link rel="icon" type="image/X-icon" href="images/logo/Secondary Logo.png">
    <title>Add Food - LaFamiliar.com</title>
</head>
<body>

    <?php include 'staffNavbar.php'; ?> 

    <!-- Side Navigation Bar -->
    <div class="sidenav">
        <a href="staffAddFood.php">Add Food</a>
        <a href="staffAllFood.php">All Food</a>
    </div>

    <div class="content">
        <h1>Add New Food</h1>
        <form action="processAddFood.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
                <span class="invalid-feedback"><?php echo $description_err; ?></span>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>">
                <span class="invalid-feedback"><?php echo $price_err; ?></span>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control-file <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $image_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>

</body>
</html>
