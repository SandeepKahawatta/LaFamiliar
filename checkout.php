<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="style/style_checkout.css">
        <link rel="stylesheet" href="style/style_footer.css">

    </head>
    <body>

        <?php include 'navbar.php'; ?>

        <?php
        session_start();

        if(isset($_SESSION['user_id'])){
            $index = $_SESSION['user_id'];
            require "config.php";

            $sql = "SELECT * FROM user WHERE id = '$index'";
            $result = $conn->query($sql);
            $result1 = $result -> fetch_assoc();
            
        ?>

        <div class="container">
            <form action="payment.php" method="post">
                <div class="row">
                    <div class="col">
                        <h3 class="title">Checkout Cart</h3>

                        <div class="inputBox">
                            <span>full name :</span>
                            <input type="text" name="name" value="<?php echo $result1["first_name"] ?>" readonly>
                        </div>
                        <div class="inputBox">
                            <span>email :</span>
                            <input type="email" name="email" value="<?php echo $result1["email"] ?>" readonly>
                        </div>
                        <div class="inputBox">
                            <span>address :</span>
                            <input type="text" name="address" value="<?php echo $result1["address"] ?>" required>
                        </div>
                        <div class="inputBox">
                            <span>Phone Number :</span>
                            <input type="text" name="phone" pattern="[o-9]{10}" value="<?php //echo $result1["phone"] ?>" >
                        </div>

                        <?php

$subtotal = 0;
// Assume $user is the user ID retrieved from the session
$user = $_SESSION['user_id'];

// Fetch cart items for the logged-in user with details from the food table
$query = "SELECT cart.*, food.name AS food_name, food.image AS food_image
          FROM cart
          INNER JOIN food ON cart.food= food.id
          WHERE cart.user = '$user'";
$result = mysqli_query($conn, $query);

// Check if any cart items are found
if (mysqli_num_rows($result) > 0) {
    // Iterate over each cart item
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

<div  class="checkout-product">
    <img src="images/cards/<?php echo $row['food_image']?>" alt="" height="100px" width="100px"/>
    <div class="details">
        <h4><?php echo $row['food_name'] ?></h4>
        <p>Quantity:<?php
        echo $row['quantity']
        ?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;Price: <?php echo number_format( $row['total'], 2 )?>
        &nbsp;&nbsp;
    </div>
</div>

<?php

$subtotal = $subtotal + $row['total'];

    }
} else {
    // Display a message if no cart items are found
    echo "Your cart is empty.";
}
?>

                        <h2 > Sub Total : </h2><input name="subTotal" value="<?php echo $subtotal ?>" >
                        

                        <div class="inputBox">
                            <span>Special Requests :</span>
                            <textarea id="sprequest" name="request" rows="4" placeholder="Enter Your Special Request" ></textarea>
                        </div>

                    </div>
                </div>

                
                 <input type="submit" name="submit" value="Payment" class="submit-btn" >
                
                
            </form>
            
        </div>

        <!--Footer-->
        <footer>
            <div class="footer_info">
                <div class="footer_width about">
                    <h2>About</h2>
                    <p>
                        LAt EventStay.com, we are a team of passionate technology expert. We are understand the importance of a comfortable and enjoyable place to arrange your special events with your favourities. That's why we have designed our platform to connect you with a vast selection of hotels, making it effortless for you to discover and book your ideal accommodations
                    </p>
                    <div class="social_media">
                        <ul>
                            <li><a href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAAAXNSR0IArs4c6QAAAbZJREFUSEu9lu01xUAQht9bAR3QASpABagAFdABKqADdEAF7q0AFaADOnCenKwz2czubOKcO3+SbDb7zPdkoTXLYs08TQXuStqXtGkU/ZS0ksQ1lBYgh19IOpO0XTnxTdKdpMcaNQICuc0siqzA0hNJKDCSGvBB0ml0euX9uSTOGEgJ+F9YgoygHhA33jdY9i7puk8W3HcgiaQiBFb2rHtzIAny0RCzZ0nHjlJAX7L1paTDtJYD0fgqsO6nz9bvRiDbSKInbnIgGbYVAKk5LEmCV3AjJcM9bs3lzyMWyMbXhtjd9LFLW1sTrGNZ4KUTcI+fA4kR3ScS4ri0wJb4cehagMQNSxCu6Z5n2/KIbcnariZbLcytKrmPXkrf9WTk0loMW4G1eHYNwFpIWlP0npCJqS9+ZaOI7N7oP2KPN1Go3W6kzanDOUnj1mFKgKiPzgF28fMsZC3qNlOBg87kTQuvAdu4TgGO+m5pHtZGVCsQGMoPJn9t4pegLUAXVoqhdR8pT6rvmMUISEairDe+mn8TGbYcclTopSjGvEM52/ZGNR39tXlNgMK2/6D5c3VqzAFGY6j6/hd272YddLyd9AAAAABJRU5ErkJggg=="/></a></li>
                            <li><a href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAAAXNSR0IArs4c6QAAAfdJREFUSEvNlj1PFUEUhh9KKyViKPEHkKgkNCQGaG2Ujo4PfwDQY9RIr4RYSYL+AqGhhcYaJSEhsRALY6mGhpI8ZO7NsMzM3b1cbjzJzezdnT3vec/HOztAn22gz3j8l4APgduA651CRk4Afz/DmtxaYvgMeAvc7yLtX4EFwPWS5QA/AnNdAFVfWQHexTdTgDL73AMwXfwFHsUpTgFah5EuAdeD81eh7rrZASRxYVVAG+OgBti/4PhBtFc2g+F/XJL4/hXAKWCvAGi0Rh83g9FbJ7PitV1qSeJmaxOrMizVz64zcm0cuAV8B36HcfHZ00yw08B+KqVG/zLxUqsOj4HnwBPgHnAKvAes3VlIszNbtcaAdppp3ALmEw5fAGvAcpjdawOa+jFgFxhOAB4Bo0CuBxoxlJkMJ4AvhYYyKKXvTy9SqrMh4Bi4e9MM9T8DbANvgNUK4C/gNfAhjMdSLxi20irLRWA2pPkQ2AA2w2mSE41sDUtz6JwpxipH1VQoO9g1ZVnATkqjzqoqMv4GKG0G6TiULKs0ytGPDi83fazutg/u1GmhBE029VrY/ykWixRg3ROjTkyyM2vtuudOfOXLWqV0sQ6QewSzvhei3bLSN42RCWojNQEWyJm1ka50dN3PRIuea/mYwCU2qVTUBaybxo77+g54DrUqZh2oRXr5AAAAAElFTkSuQmCC"/></a></li>
                            <li><a href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAAAXNSR0IArs4c6QAAASBJREFUSEvtltttwkAQRY8rSNIBqYBQQUIH6SB0QqiAEoAKonQAFUAHCRUAFRBdNItGli2t4rHlD+/f+jFn796Z2S3oeBQd8+gF8B0YByr/Bg4pXlmhYF+BsBTqGfjVpAz8BOYtAKfANgd4tO14Ax4aLCQLKNjIII/AqW3gBpg5iIz/bzJlKZTJE+BsSn/aVpjiy2x52GRkKbz4+gFejbhzZD2T12t7Js9VWuUEywIqsFd2taC+lATyPusTQeW3h4YB67ZZi1i5l2FAlcvSAi9SN6lIsjCgtvTDgOqZ8i+NZIHmYUBlsE+mKs8H4P20yCmLYUtTxmZlaZPeWf63P8AXYB8pzWI92TFXeU1U800nfQRbjVxn6m304l4aoao2xh+pg2wdpiHn9wAAAABJRU5ErkJggg=="/></a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer_width link">
                    <h2>Quick Links</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="card.html">Hotels</a></li>
                        <li><a href="contactUs.php">Contact Us</a></li>
                        <li><a href="aboutUs.html">About Us</a></li>
                    </ul>
                </div>

                <div class="footer_width contact">
                    <h2>Contact</h2>
                    <ul>
                        <li>
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAAAXNSR0IArs4c6QAAAZ1JREFUSEvNluExBEEQRt9FQAaIABEgAkSACBABIkAEyOBkQASIABEgAuq7mlVzvT0zfYsr/Werdnrmdfd0f7sj5myjOfOYFbgMbAOLWaAvwC3wHgk+CtwETgA9S3YNnAEKoGgR4AVwGIk+ZXkMCO5aC6iNe0FY7nZQgtaAR8D5AFi3ZQu4s/tLQDXFs2mObu8NME7lk58C23ACewTWo0Dv3j5S0+gga/vAlfN+NwX3vVTKUJ22ZA7obTbrp6mT89eqhoJpAj/NYa+AZrBmKu+bceiV1ctwDXgwGzXYO4EGEmDV+E0xPKAyUcPkNhSoe89VqShttqS605UBJb236vRvmsYbC4mzhvlPxsK7x66ikrtu8OWntvdE3e3smrRJljwFCTTrxEVfDs3mlNWAtSxb0OLctr4Wnnq0YFp3hVsLLaB8Zi2tW8ouyghQg6vOtNrqZdoUiAhQB0vulOlCpZ5PqVur/zZRYAsagkXvME9KnasZzAVaZdQs/upfWw7VnQqqGb1MX/xI5058ZimpPVTq0vtnaZF/Amyd7a5/ASnlTh38EtbaAAAAAElFTkSuQmCC"/></span>
                            <p>
                                26985 Brighton Lane, Lake Forest, CA 92630
                            </p>
                        </li>

                        <li>
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAAAXNSR0IArs4c6QAAASxJREFUSEvtltFRwkAURQ8VYAdoB5SAFWAJ2oFUgHSAFUgHlqCWYAdYgXQAc2byZnZkE5Yk5gf2L5Pde/fc9zbZEQOP0cB+XKbhLTDpMepvYBd6aaQ3wAcw7dEspDbAkw+p4SPw9g9mIXkHbFPDF2AJ/ADSjnswVyvKswDWOcMv4AEwhnkH01dAiN9KY+VzneGsmhTG59BKZXk+K439KcMtcG/e1UTjLaUNquhKN24jOmoJfekC41AgRhPtXyo3aT88J+sbDWOesdjOTbQ5Krvd85yOIsMmWhOQIGqVo2plWEebilmrHFUnwxztKarOhint2oOcqVXd0S2uYYez365proalCQxew6O/hZ+u99Lttph39D9UwzbXuO8rhh9/tS/01taiPOVLBr8IHwBD9VMdEMKXRQAAAABJRU5ErkJggg=="/></span>
                            <a href="#">John@sajadhesami.com</a>
                        </li>

                        <li>
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAAAXNSR0IArs4c6QAAAV9JREFUSEvNlv8xBEEQhb+LgAwQASJABGTgRIAICIEIEAEZIAInAmRABupV7ai51tOzt7O29J93e+/b/vX6Zkwcs4l5/DvgDrAYswqlDNeBR0DAc+BqLKgHFEQwQVOcALdjQC1wE3gxsFGhFngJXASZ7Lb21ALnwE0A/AQOWqAWuN/1L2rXO7A1tJ9eD98qYs+AXmxQeFOqsq0V1F47mJ4ZFB5Q43/sqDXDpOkBj4B7A/zoTGBwZkmv5DQajI0M2jQo+cuXgN4+1txGpqEKhFWIvFSmnWcZ7WDa3+qeRufJ66UnKO+VHaYIobV7qCtxagZIgvr8GlAZrdGH3lsD6scPwGFh6QTPr4p97Fff+wAlqIy83eyz/EvQPsAk6pW3D/Arr8IqQInLQ+VE+fTWoEv/GFYFJnGtwRmwXaHdAXr2J4YCk4BWQuujzPcM3L0qrUAvwXS6nrwv/wIYVnly4DcJIz4d9R+fCAAAAABJRU5ErkJggg=="/></span>
                            <a href="#">+30-2106019311</a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="copy-right">
                <p>
                    Copyright &copyEventStay 2023 All Rights Reserved.
                </p>
            </div>
        </footer>
    <!--end-->

    </body>
</html>

<?php
}else{
    header("Location:login.php?not logged");
    exit();
}
?>



