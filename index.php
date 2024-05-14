

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <?php include 'navbar.php'; ?>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_card_type1.css">
    <link rel="stylesheet" href="style/style_card_type2.css">
    <link rel="stylesheet" href="style/style_location.css">
    <link rel="stylesheet" href="style/style_review.css">
    <link rel="stylesheet" href="style/style_footer.css">
    <link rel="icon" type="image/X-icon" href="images/logo/Secondary Logo.png">
    <title>LaFamiliar.com</title>
</head>
<body>

    
      
    <!--Home Welcome-->
    <div class="Home_top">
        <div class="image-content">
            <h1>La<span>Familiar</span></h1>
            <a>Welcome</a>
        </div>
    </div>
    <br>

    

    <!--Food card Horizontal-->
    <div class="section" onclick="displayDetails(2)">
        <img src="images/foods/burger.webp" alt="Classic Burger">
        <div class="text-box">
            <h2>Classic Burger Delight</h2>
            <p>Indulge in the ultimate burger experience with our Classic Burger Delight. Made from the finest ingredients and seasoned to perfection, our classic burger is a mouthwatering blend of juicy beef patty, melted cheese, crisp lettuce,
                and tangy pickles, all nestled between soft, toasted buns. Whether you're craving a quick bite or a satisfying meal, our classic burger is sure to tantalize your taste buds and leave you craving for more.</p>
        </div>
    </div>


    <!--Food Cards-->
        <div class="card_container">

        <figure class="card">
            <div class="image">
                <img src="images/foods/pizza.jpg" alt="Pizza">
            </div>
            <figcaption>
                <h3>Classic Pepperoni Pizza</h3>
                <p>
                    Indulge in the timeless flavor of our classic pepperoni pizza, topped with savory pepperoni slices and melted cheese.
                </p>
            </figcaption>
            <a href="AllFoods.php">Order Now</a>
        </figure>
        
        <figure class="card">
            <div class="image">
                <img src="images/foods/burger.webp" alt="Burger">
            </div>
            <figcaption>
                <h3>Signature Cheeseburger</h3>
                <p>
                    Treat yourself to our mouthwatering signature cheeseburger, crafted with juicy beef patty, melted cheese, and fresh veggies.
                </p>
            </figcaption>
            <a href="AllFoods.php">Order Now</a>
        </figure>

        <figure class="card">
            <div class="image">
                <img src="images/foods/sushi.jpg" alt="Sushi">
            </div>
            <figcaption>
                <h3>Fresh Sushi Platter</h3>
                <p>
                    Experience the exquisite taste of our fresh sushi platter, featuring a variety of handcrafted sushi rolls and sashimi.
                </p>
            </figcaption>
            <a href="AllFoods.php">Order Now</a>
        </figure>
        
    </div>


   
    

    <br>

    <?php include 'footer.php'; ?>

    

    

<script src="java/script_detail_2.js"></script>

</body>
</html>

