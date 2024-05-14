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
<?php

require "config.php";



$query = "SELECT * FROM food";
$result = mysqli_query($conn, $query);


if(mysqli_num_rows($result) > 0) {
    
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

                <form method="POST">
                    <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" value="1" min="1">
                    <div class="read-more">
                        <button type="submit" name="add_to_cart" >Add to Cart</button>
                    </div>
                </form>


            </div>
        </div>
        <?php
    }
} else {
    echo "No hotels found in the database.";
}

mysqli_close($conn);
?>

</body>
</html>