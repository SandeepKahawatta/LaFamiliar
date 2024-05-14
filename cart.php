<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style_card.css">
    <link rel="stylesheet" href="style/style_cart.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="cart-container">
        <div class="cart-container-left">
        <?php
    require "config.php";

    $user = $_SESSION['user_id'];

    // Fetch cart items for the logged-in user with details from the food table
    $query = "SELECT cart.*, food.name AS food_name, food.image AS food_image, food.price AS food_price
            FROM cart
            INNER JOIN food ON cart.food= food.id
            WHERE cart.user = '$user'";
    $result = mysqli_query($conn, $query);

    // Check if any cart items are found
    if (mysqli_num_rows($result) > 0) {
        // Iterate over each cart item
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="product-page">
                <div class="product-image">
                    <!-- Assuming you have a column named 'image' in the food table -->
                    <img src="images/cards/<?php echo $row['food_image']; ?>" alt="" class="siImg" />
                </div>
                <div class="product-details">
                    <div class="siDesc">
                        <!-- Use details from both 'cart' and 'food' tables -->
                        <h2 class="product-name"><?php echo $row['food_name']; ?></h2>
                        <span class="product-quantity">Quantity: <?php echo $row['quantity']; ?></span>
                        <span class="product-price">Price: Rs.<?php echo $row['total']; ?></span>
                        <span class="siTaxOp">Includes taxes and fees</span>
                        <span class="siCancelOp"></span>
                        <span class="siCancelOpSubtitle"></span>
                    </div>

                    <div class="siDetails">
                        <div class="siDetailTexts">
                            <!-- Your logic for updating and removing items -->
                            <form action="updateCartItem.php" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>">
                                <input type="number" name="price" value="<?php echo $row['food_price']; ?>">
                                <button type="submit" class="update-button">Update</button>
                            </form>
                            <form action="removeCartItem.php" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="remove-button">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        // Display a message if no cart items are found
        echo "Your cart is empty.";
    }


    ?>
        </div>
            <div class="cart-container-right">
                <div class="cart-summery">
                    <h3 class="cart-summery-header">Summer of the Cart</h3>
                    
                    <?php

    $user = $_SESSION['user_id'];

    // Fetch cart items for the logged-in user with details from the food table
    $query = "SELECT cart.*, food.name AS food_name, food.image AS food_image
            FROM cart
            INNER JOIN food ON cart.food= food.id
            WHERE cart.user = '$user'";
    $result = mysqli_query($conn, $query);

    $subtotal = 0;

    if (mysqli_num_rows($result) > 0) {
        // Iterate over each cart item
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="cart-summery-items">
                        <span><?php echo $row['food_name']; ?></span>
                        <span><?php echo $row['total']; ?></span>

                        </div>
                        <?php


                        $subtotal = $subtotal +  $row['total'];
        }
    } else {
        echo "Your cart is empty.";
    }
    ?>
                    <div class="cart-summery-total">
                        <span>Subtotal:</span><span id="subtotal"><?php echo "Rs. " . number_format($subtotal,2); ?></span>
                    </div>


                    <div class="cart-summery-btn">
                        <form action="checkout.php" method="post">
                            <button type="submit" name="checkout">Checkout</button>
                        </form>
                    </div>

                    
                </div>
            </div>
        </div>

    <?php
    mysqli_close($conn);
    ?>
            

        

        <?php include 'footer.php'; ?>


    </body>
</html>