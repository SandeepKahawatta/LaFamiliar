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

    <!--Navigation Bar-->
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="images/logo/Primary Logo.png" alt="Logo" width="250px" height="100px">  
            </div>
            <ul class="links">
                <li class="nav"><a class="nav_a" href="staffHome.php"><b>Home</b></a></li>
                <li class="nav"><a class="nav_a" href="staffOrders.php"><b>Orders</b></a></li>
                <li class="nav"><a class="nav_a" href="staffManageFoods.php"><b>Manage Foods</b></a></li>
            </ul>
            <div class="shortcut">
                <div class="profile-img">
                    <a href="profile.php"><img src="images\user\profile.png" width="30px" height="30px"></a>
                </div>
            </div>
        </div>
    </header>
    <!--end-->

    <!-- Side Navigation Bar -->
    <div class="sidenav">
        <a href="staffAddFood.php">Add Foods</a>
        <a href="editFood.php">All Foods</a>
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
                <a href="staffManageFoods.php" class="btn btn-secondary ml-2">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>
