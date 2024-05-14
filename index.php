

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
            <a href="aboutUs.html">Welcome</a>
        </div>
    </div>
    <br>

    

    <!--Food card Horizontal-->
    <div class="section" onclick="displayDetails(2)">
        <img src="images/hotel/88th ella/88-2.jpg" alt="88th ella">
        <div class="text-box">
            <h2>88th Ella Hotel</h2>
            <p>Set amongst the golden dunes and the lush greenery in Yala Sri Lanka, Uga Chena Huts blends Sri Lanka's most celebrated features - its tropical beaches and its exotic wildlife.
                Our Yala hotel has been designed with its surrounding tropical jungles and saline lake in mind. Enveloped in a world of scenic splendour and exotic fauna, our 'huts' are luxurious private cabins that offer awe-inspiring views 
                of the surrounding wilderness and seascape.</p>
        </div>
    </div>

    <!--Food Cards-->
    <div class="card_container">

        <figure class="card" onclick="displayDetails(11)">
            <div class="image">
                <img src="images/hotel/Uga Bay/ugab-1.jpg" alt="Uga Bay">
            </div>
            <figcaption>
                <h3>Uga Bay</h3>
                <p>
                    Uga Bay is a luxury Pasikuda beach hotel situated on one of Sri Lanka's most celebrated beach stretches Pasikuda.
                </p>
            </figcaption>
            <a href="https://www.ugaescapes.com/ugabay/">Read More</a>
        </figure>
        
        <figure class="card" onclick="displayDetails(12)">
            <div class="image">
                <img src="images/hotel/Uga Chena Huts/chen-1.jpg" alt="Uga Chena Huts">
            </div>
            <figcaption>
                <h3>Uga Chena Huts</h3>
                <p>
                    Set the lush greenery in Yala Sri Lanka, Uga Chena Huts blends Sri Lanka's most celebrated features.
                </p>
            </figcaption>
            <a href="https://www.mrandmrssmith.com/luxury-hotels/uga-chena-huts">Read More</a>
        </figure>

        <figure class="card" onclick="displayDetails(10)">
            <div class="image">
                <img src="images/hotel/Kingsbury hotel/kings-1.jpg" alt="kingsbury hotel">
            </div>
            <figcaption>
                <h3>Kingsbury Hotel</h3>
                <p>
                    Lakeside Buddhist temple of Gangarama, Uga Residence is one of the most lavish boutique hotels in Colombo.
                </p>
            </figcaption>
            <a href="https://en.wikipedia.org/wiki/The_Kingsbury">Read More</a>
        </figure>
        
    </div>

    <!--Hotel card Horisontal-->
    <div class="section" onclick="displayDetails(9)">
        <img src="images/hotel/Marino beach hotel/mari-1.jpg" alt="marino beach hotel">
        <div class="text-box">
            <h2>Marino Beach Hotel</h2>
            <p>Set amongst the golden dunes and the lush greenery in Yala Sri Lanka, Uga Chena Huts blends Sri Lanka's most celebrated features - its tropical beaches and its exotic wildlife.
                Our Yala hotel has been designed with its surrounding tropical jungles and saline lake in mind. Enveloped in a world of scenic splendour and exotic fauna, our 'huts' are luxurious private cabins that offer awe-inspiring views 
                of the surrounding wilderness and seascape.</p>
        </div>
    </div>

    <br>

    <h1 class="h1_type1">Explore Sri-lanka</h1>

    <!--Locations-->
    <div class="location_container"> 
        <div class="box"> 
    
            <div class="location">
                <div class="image">
                <img src="images/locations/Colombo.jpg">
                <a href="card.html">
                <h2>COLOMBO</h2>
                </a>
                </div> 
                <div class="image">
                <img src="images/locations/nuwara eliya.jpg">
                <a href="card.html">
                <h2>NUWARA ELIYA</h2>
                </a>
                </div>
            </div>
    
            <div class="location"> 
                <div class="image">
                <img src="images/locations/Kandy--3.jpg">
                <a href="card.html">
                <h2>KANDY</h2>
                </a>
                </div>
                <div class="image">
                <img src="images/locations/ella.jpg">
                <a href="card.html">
                <h2>ELLA</h2>
                </a>
                </div>
            </div>
    
            <div class="location">
                <div class="image">
                <img src="images/locations/Sigiriya.jpg">
                <a href="card.html">
                <h2>SIGIRIYA</h2>
                </a>
                </div>  
                <div class="image">
                <img src="images/locations/Fort-Galle.jpg">
                <a href="card.html">
                <h2>GALLE</h2>
                </a>
                </div>
            </div>
    
        </div>
    </div>

    <br>

    <!--Hotel Brands-->
    <section class="Hotel_Brands">
        <div class="brand_container">
            <div class="brand_box">
                <img src="images/logo/cinnamon-logo.png" alt="">
            </div>

            <div class="brand_box">
                <img src="images/logo/Kingsbury-Indulgence-logo-mobile.png" alt="">
            </div>

            <div class="brand_box">
                <img src="images/logo/centara.png" alt="">
            </div>

            <div class="brand_box">
                <img src="images/logo/ITCs Hotel Group.png" alt="">
            </div>

            <div class="brand_box">
                <img src="images/logo/tree-symbol-four-seasons-hotels-and-resorts-logo-png-23.png" alt="">
            </div>

            <div class="brand_box">
                <img src="images/logo/Taj.png" alt="">
            </div>

            <div class="brand_box">
                <img src="images/logo/galleface.svg" alt="">
            </div>
        </div>
    </section>

    <br>
    <br>

    <!--Customer Review-->

    <div class="review">
        
        <div class="title">
            <h1>Customer Reviews</h1>
        </div>

        <div class="rev-container">

            <div class="indicator">
                <span class="btn active"></span>
                <span class="btn"></span>
                <span class="btn"></span>
                <span class="btn"></span>
            </div>
            <div class="slider">
                <div class="slide-row" id="slide">

                    <div class="slide-col">
                        <div class="user-text">
                            <p>Our 1st experience with group of friends.I would like to say that we had an unforgettable stay.Service provided by the caretaker Supramanium was also satisfactory. Food was delicious.</p>
                            <h3>Avishka Rajasinghe</h3>
                        </div>
                        <div class="user-img">
                            <img src="images/review/men1.jpg" alt="">
                        </div>
                    </div>

                    <div class="slide-col">
                        <div class="user-text">
                            <p>The Story Behind The History Of The Property. The Ambiance and The Peaceful Surrounding of Nature</p>
                            <h3>Vihagi Akashi</h3>
                        </div>
                        <div class="user-img">
                            <img src="images/review/women1.jpg" alt="">
                        </div>
                    </div>

                    <div class="slide-col">
                        <div class="user-text">
                            <p>Great service.The room was very spacious, clean, and had the amenities we needed. The location is great- very near Central Train Station. I would recommend to friends, and will definitely stay again</p>
                            <h3>Uditha Thennakoon</h3>
                        </div>
                        <div class="user-img">
                            <img src="images/review/men2.jpg" alt="">
                        </div>
                    </div>

                    <div class="slide-col">
                        <div class="user-text">
                            <p>Hospitality, kindness, cleanliness ans service were there as expected. Be sure if I had to come back in the future, I’ll come back there ! And I’d recommand certainly your Hôtel.</p>
                            <h3>Ashen Kahawatta</h3>
                        </div>
                        <div class="user-img">
                            <img src="images/review/men3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    

    <br>

    <?php include 'footer.php'; ?>

    

    <!--Script for Customer Review-->
    <script>
        var btn = document.getElementsByClassName("btn");
        var slide = document.getElementById("slide");

        btn[0].onclick = function(){
            slide.style.transform = "translateX(0px)";

            for(i=0; i<4; i++){
                btn[i].classList.remove("active");
            }
            this.classList.add("active");
        }
        btn[1].onclick = function(){
            slide.style.transform = "translateX(-800px)";

            for(i=0; i<4; i++){
                btn[i].classList.remove("active");
            }
            this.classList.add("active");
        }
        btn[2].onclick = function(){
            slide.style.transform = "translateX(-1600px)";

            for(i=0; i<4; i++){
                btn[i].classList.remove("active");
            }
            this.classList.add("active");
        }
        btn[3].onclick = function(){
            slide.style.transform = "translateX(-2400px)";

            for(i=0; i<4; i++){
                btn[i].classList.remove("active");
            }
            this.classList.add("active");
        }
    </script>

<script src="java/script_detail_2.js"></script>

</body>
</html>

