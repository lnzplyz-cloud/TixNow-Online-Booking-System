<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Page</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.min.js" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.js" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css"> 
</head>
<body>
<?php
include("header.php");
?>

<section id="aboutUs" class="about-us-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title-custom">About Us</h2>
                <h3 class="welcome-heading-custom">WELCOME TO TIXNOW 🇵🇭</h3>
            </div>
        </div>

        <div class="row about__content align-items-center mb-5">
            <div class="col-lg-6 col-md-6 order-md-1 order-1"> 
                <div class="about__image__wrapper">
                    <img src="image/about1.png" alt="TixNow Online Booking" class="img-fluid about__image__custom">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 order-md-2 order-2"> 
                
                <h5><strong>TixNow is your premier, Philippine-based digital platform</strong> dedicated to bringing the magic of the cinema closer to you with unmatched <em>convenience and speed</em>.</h5>
                
                <p class="about-paragraph-custom">Launched in the heart of Metro Manila, TixNow was created to simplify the **movie-going experience** across the Philippines. We currently partner with over **450 screens** and 100+ cinema locations, helping audiences from Luzon to Mindanao easily book tickets from their phones or computers.
                <br><br>
                Our mission is to combine the rich Filipino legacy of cinema appreciation with **cutting-edge technology**. We believe that booking a ticket should be as joyful as watching the film itself. That’s why we’ve built a <em>user-friendly system</em> that provides **real-time seating charts**, instant booking confirmation, and multiple secure payment options, including local favorites like **GCash and PayMaya**.
                </p> 
            </div>
        </div>

        <div class="row justify-content-center pt-4">
            <div class="col-lg-10 col-md-12 text-center">
                <h4 class="text-center text-light mb-4">Our Commitment: 24/7 Service and Memorable Experiences</h4>
                
                <div class="about__image__wrapper large-image">
                    <img src="image/about2.png" alt="TixNow Commitment" class="img-fluid about__image__custom">
                </div>
                
                <p class="about-paragraph-custom">
                    TixNow is instrumental in modernizing the local film exhibition industry, offering a **24/7 service** that ensures you never miss out on the latest blockbusters or that perfect seat. We are passionate about creating **memorable experiences**—and it all starts with your first click.
                </p>
            </div>
        </div>
        
    </div>
</section>
<?php
include("footer.php");
?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>