<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style_footer.css">
    <link rel="stylesheet" href="style/style_card.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php include 'navbar.php'; ?>


    <div class="search-container" style="margin-top: 100px;">
    <form action="AllFoods.php" method="GET">
        <input type="text" placeholder="Search for food..." name="search" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;"><i class="fa fa-search"></i></button>
    </form>
</div>


    <?php

    require "config.php";



    // Check if the search query parameter is present in the URL
if(isset($_GET['search']) && !empty($_GET['search'])){
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
if(mysqli_num_rows($result) > 0) {
    // Display the food items
    while($row = mysqli_fetch_assoc($result)) {
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

                    <form action="addToCartProcess.php" method="POST">
                        <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="food_price" value="<?php echo $row['price']; ?>">
                        <label for="quantity" style="display: block; margin-bottom: 10px;">Quantity:</label>
                        <input type="number" name="quantity" value="1" min="1" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        <div class="read-more">
                            <button type="submit" name="add_to_cart">Add to Cart</button>
                        </div>
                    </form>


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

    <?php include 'footer.php'; ?>

</body>

</html>