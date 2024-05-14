<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_NavBar.css">
</head>
<body>

    <!--Navigation Bar-->
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="images/logo/Primary Logo.png" alt="Logo" width="250px" height="100px">  
            </div>
            <ul class="links">
                <li class="nav"><a class="nav_a" href="index.php"><b>Home</b></a></li>
                <li class="nav"><a class="nav_a" href="AllFoods.php"><b>Food Ordering</b></a></li>
                <li class="nav"><a class="nav_a" href="cart.php"><b>Cart</b></a></li>
                <li class="nav"><a class="nav_a" href="aboutUs.html"><b>About Us</b></a></li>
                <li class="nav"><a class="nav_a" href="contactUs.php"><b>Contact</b></a></li>
            </ul>
            <div class="shortcut">
                <?php
                session_start();

                // Check if user is logged in
                if(isset($_SESSION['user_id'])) {
                    // If user is logged in, display logout button
                    echo '<a href="logout.php" class="btn_type1">Logout</a>';
                    // Display profile image
                    echo '<div class="profile-img">
                            <a href="profile.php"><img src="images/refund/profile.png" width="30px" height="30px"></a>
                          </div>';
                } else {
                    // If user is not logged in, display login button
                    echo '<a href="login.php" class="btn_type1">Login</a>';
                }
                ?>
            </div>
        </div>
    </header>
    <!--end-->

</body>
</html>