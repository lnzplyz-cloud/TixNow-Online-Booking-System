<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.php"><img src="img/logo.png" alt="Logo"></a>
                    </div>
                    <p>Providing the best movie listings and booking experience.</p>
                </div>
            </div>
            
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Quick Links</h6>
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="allmovie.php">Movies</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Support</h6>
                    <ul>
                        <li><a href="./feedback.php">Feedback</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>Contact Us</h6>
                    <div class="footer__newslatter">
                        <p>Get in touch with the latest updates!</p>
                        <form action="#">
                            <input type="text" placeholder="Your email">
                            <button type="submit" class="site-btn" style="background-color: #f6121d;">Subscribe</button>
                        </form>
                    </div>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">
                    <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Movie Platform</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Footer Styling */
    .footer {
        background: #0b0c2a;
        padding-top: 50px;
        padding-bottom: 20px;
        color: #ccc;
    }
    .footer__about .footer__logo img {
        margin-bottom: 20px;
    }
    .footer__about p {
        color: #ccc;
        margin-bottom: 20px;
    }
    .footer__widget h6 {
        color: #fff;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 25px;
    }
    .footer__widget ul li {
        list-style: none;
        margin-bottom: 10px;
    }
    .footer__widget ul li a {
        color: #ccc;
        font-size: 14px;
        text-decoration: none;
    }
    .footer__widget ul li a:hover {
        color: #f6121d; /* Red hover */
    }
    .footer__newslatter input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        background: #1e1e3e;
        border: 1px solid transparent;
        color: #fff;
        border-radius: 4px;
    }
    .footer__social a {
        display: inline-block;
        font-size: 18px;
        color: #fff;
        margin-right: 15px;
        transition: color 0.3s;
    }
    .footer__social a:hover {
        color: #f6121d;
    }
    .footer__copyright__text {
        padding-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 30px;
    }
    .footer__copyright__text p {
        margin-bottom: 0;
        font-size: 14px;
        color: #777;
    }
</style>