<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_NavBar.css">
    <link rel="stylesheet" href="style/style_staffNavbar.css">
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
                <div>
                    <?php
                        echo '<a href="logout.php" class="btn_type1">Logout</a>';
                    ?>
                </div>
            </div>

        </div>
    </header>
    <!--end-->

    <script>
        // JavaScript for navbar scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            header.classList.toggle('scrolled', window.scrollY > 0);
        });
    </script>

</body>
</html>
