<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feedback Page</title>

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

<section class="feedback spad">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row align-items-center feedback-content-row">
                    
                    <div class="col-lg-7 mb-5 mb-lg-0">
                        <h2 class="feedback-title">Fill the form. <br> It's easy.</h2>
                        
                        <form onsubmit="return feedbackvalidate();">
                            
                            <div class="row mb-3">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control feedback-input" name="feedbackname" id="feedbackname" placeholder="First name">
                                    <div id="nameerror" class="error-message"></div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control feedback-input" name="feedbackemail" id="feedbackemail" placeholder="Email">
                                    <div id="emailerror" class="error-message"></div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12 form-group">
                                    <textarea class="form-control feedback-input" name="feedbackmassage" id="feedbackmassage" cols="30" rows="7" placeholder="Write your message"></textarea>
                                    <div id="massageerror" class="error-message"></div>
                                    <div id="msg" class="error-message"></div>
                                </div>
                            </div>
                            
                            <?php 
                            if (!isset($_SESSION['uname'])) {
                            ?>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="button" data-toggle="modal" data-target="#tailer_modal" class="btn btn-dark feedback-btn-login-prompt">
                                            <font style="color:white;">Send Message</font>
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="tailer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <h3 class="p-3">You need to login</h3>
                                            <a class="btn btn-primary btn-sm m-3" href="login_form.php">Login</a>
                                        </div>
                                    </div>
                                </div> 
                            <?php
                            } else {
                            ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" id="feedbackform" class="btn btn-primary feedback-submit-btn">Send Message</button> 
                                    </div>
                                </div>
                            <?php 
                            }
                            ?>
                        </form>
                    </div>
                    
                    <div class="col-lg-4 ml-auto feedback-info-box">
                        <h3 class="info-title">Let's talk about everything.</h3>
                        <p class="info-text">Do let us know your thoughts and suggestions on how we can serve you better. Give us feedback on how you feel about our service.</p>
                        <div class="image-placeholder">
                             
                        </div>
                    </div>
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
<script type="text/javascript">
    // Simplified the validation messages to use consistent text
    function feedbackvalidate(){
        var error = "";
        var f_name = document.getElementById("feedbackname");
        var f_email = document.getElementById("feedbackemail");
        var f_massage = document.getElementById("feedbackmassage");

        if(f_name.value == "") {
            error = "<font color='red'>!Name is required.</font>";
            document.getElementById("nameerror").innerHTML = error;
            return false;
        }
        if(f_email.value == "") {
            error = "<font color='red'>!Email is required.</font>";
            document.getElementById("emailerror").innerHTML = error;
            return false;
        }
        if(f_massage.value == "") {
            error = "<font color='red'>!Message is required.</font>";
            document.getElementById("massageerror").innerHTML = error;
            return false;
        }
    }

    $(document).ready(function(){
        $("#feedbackform").click(function(){
            var feedbackname = $("#feedbackname").val().trim();
            var feedbackemail = $("#feedbackemail").val().trim();
            var feedbackmassage = $("#feedbackmassage").val().trim();
            $.ajax({
                url:'feedback_action.php',
                type:'post',
                data:{feedbackname:feedbackname,feedbackemail:feedbackemail,feedbackmassage:feedbackmassage},
                success:function(response){
                    if(response == 1){
                        window.location = "feedback.php";
                    } else {
                        error = "<font color='red'>!Submission failed. Please try again.</font>";
                        document.getElementById("msg").innerHTML = error;
                        return false;
                    }
                }
            });
        });
    });
</script>
</body>
</html>