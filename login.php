<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style/style_login.css">
    <link rel="stylesheet" type="text/css" href="style/style_footer.css">
    <link rel="stylesheet" type="text/css" href="style/style_NavBar.css">
    <link rel="icon" type="image/X-icon" href="login/Secondary Logo.png">
    <title>Login Page</title>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="body_container">
        <div class="container">
            <div class="signin-signup">
                <form action="loginprocess.php" method="post" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <?php if(isset($_GET['error'])) {?>
                        <p class="error"><?php echo $_GET['error'] ?></p>
                    <?php }?>
                    <div class="input-feild">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        <input type="text" name="username" id="" placeholder="Username">
                    </div>
                    <div class="input-feild">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <input type="password" name="logpassword" id="" placeholder="Password">
                    </div>
                    <input type="submit" onclick="signin()" value="Login" class="btn_login">
                    <p class="text">By signing in or creating an account, you agree with our <span>Terms & conditions</span> and <span>Privacy statement</span>.</p>
                    <p class="text">Copyright © LaFamiliar 2023 All Rights Reserved.</p>
                </form>
    
                <form action="submitsignup.php" method="post" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-feild">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        <input type="text" name="firstname" id="" placeholder="First Name" required>
                    </div>
                    <div class="input-feild">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        <input type="text" name="lastname" id="" placeholder="Last Name" required>
                    </div>
                    <div class="input-feild">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        <input type="text" name="address" id="" placeholder="address" required>
                    </div>
                    <div class="input-feild">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <input type="email" name="email" id="" placeholder="Email" required>
                    </div>
                    <div class="input-feild">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="tel" name="phone" id="" pattern="[o-9]{10}" placeholder="Phone Number" required>
                    </div>
                    <div class="input-feild">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <input type="password" name="password" id="pass" placeholder="Password" required>
                    </div>
                    <div class="input-feild">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <input type="password" name="re-password" id="repass" placeholder="Re-Enter Password" required>
                    </div>
                    <input type="submit" value="sign up" name="submitlog" class="btn_login">
                    <p class="text">By signing in or creating an account, you agree with our <span>Terms & conditions</span> and <span>Privacy statement</span>.</p>
                    <p class="text">Copyright © LaFamiliar 2023 All Rights Reserved.</p>
                </form>
            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>Member of Brand</h3>
                        <p>Welcome to LaFamiliar.</p>
                        <button class="btn_login" id="sign-in-btn">Sign in</button>
                    </div>
                    <img src="images/login/sign-in.png" alt="" class="image">
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>New to Brand</h3>
                        <p>Welcome to LaFamiliar.</p>
                        <button class="btn_login" id="sign-up-btn">Sign up</button>
                    </div>
                    <img src="images/login/sign-up.png" alt="" class="image">
                </div>
            </div>
        </div>
    </div>
    

    <!--Footer-->
    <footer>
            <div class="footer_info">
                <div class="footer_width about">
                    <h2>About</h2>
                    <p>
                        At LaFamiliar.com, we are a team of passionate technology expert. We are understand the importance of a comfortable and enjoyable place to arrange your special events with your favourities. That's why we have designed our platform to connect you with a vast selection of hotels, making it effortless for you to discover and book your ideal accommodations
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

    <script src="java/login.js"></script>
</body>
</html>