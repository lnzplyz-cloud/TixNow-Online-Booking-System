<?php
session_start();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="TixNow Movie Ticket Booking Contact Page">
    <meta name="keywords" content="TixNow, contact, movie tickets, Philippines">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact TixNow</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <?php
    include("header.php");
    ?>

    <section class="contact spad contact-info-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title-custom">Get In Touch</h2>
                    <p class="text-white-50">We are ready to assist you! Find our headquarters or send us a quick message.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2 class="text-danger">Contact Us</h2>
                            <p>For immediate support, please use the contact form or call us during business hours.</p>
                        </div>
                        <ul class="contact-list">
                            <li>
                                <h4>Headquarters (Manila)</h4>
                                <p>TixNow HQ, 5th Floor, Cinema Tower, Makati Ave, Makati City, Philippines.<br />
                                    <i class="fa fa-phone me-2"></i> +63 2 8555 1234<br />
                                    <i class="fa fa-envelope me-2"></i> support@tixnow.ph
                                </p>
                            </li>
                            <li>
                                <h4>Customer Service</h4>
                                <p>Available 9:00 AM - 6:00 PM PHT, Monday to Saturday.<br />
                                    <i class="fa fa-mobile me-2"></i> +63 917 555 6789 (Globe)<br />
                                    <i class="fa fa-mobile me-2"></i> +63 998 777 0000 (Smart)
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="contact-form-wrapper p-4">
                        <h4 class="text-white mb-4">Send Us a Message</h4>
                        <form action="#" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="5" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit Inquiry</button>
                        </form>
                    </div>
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