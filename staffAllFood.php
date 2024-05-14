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
    <link rel="stylesheet" href="style/style_footer.css">
    <link rel="stylesheet" href="style/style_card.css">
    <link rel="stylesheet" href="style/style_staffAllFood.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <li class="nav"><a class="nav_a" href="staffAllFood.php"><b>Manage Food</b></a></li>
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
        <a href="staffAddFood.php">Add Food</a>
        <a href="staffAllFood.php">All Food</a>
    </div>


    <div class="search-container">
        <form action="staffAllFood.php" method="GET">
            <input type="text" placeholder="Search for food..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>


    <?php

    require "config.php";

    // Check if the search query parameter is present in the URL
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        // Sanitize the search query to prevent SQL injection
        $search = mysqli_real_escape_string($conn, $_GET['search']);

        // Construct the SQL query to search for food
        $query = "SELECT * FROM food WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
    } else {
        // If no search query provided, retrieve all food items
        $query = "SELECT * FROM food";
    }

    // Execute the SQL query
    $result = mysqli_query($conn, $query);

    // Check if any food items are found
    if (mysqli_num_rows($result) > 0) {
        // Display the food items
        while ($row = mysqli_fetch_assoc($result)) {
    ?>

            <div class="container">
                <div class="img-container">
                    <img src="images/cards/<?php echo $row['image']; ?>" alt="Food" width="100%">
                </div>

                <div class="description">

                    <h2><?php echo $row['name']; ?></h2>

                    <p><?php echo $row['description']; ?></p>

                    <br>

                    <h3>Price: Rs. <?php echo $row['price']; ?></h3>

                    <br>

                    <!-- Edit and Delete buttons -->
                    <div class="buttons">
                        <a href="staffEditFood.php?id=<?php echo $row['id']; ?>" class="edit-button">Edit</a>
                        <a href="staffDeleteFood.php?id=<?php echo $row['id']; ?>" class="delete-button">Delete</a>
                    </div>
                    <!-- End Edit and Delete buttons -->

                </div>
            </div>

    <?php
        }
    } else {
        // Display a message if no food items are found
        echo "No food items found.";
    }

    mysqli_close($conn);
    ?>



</body>

</html>