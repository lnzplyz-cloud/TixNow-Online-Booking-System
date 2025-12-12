<?php 
session_start(); 
if (!isset($_SESSION['uname'])) {
    header("location:index.php");
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Booking Payment Page">
    <meta name="keywords" content="cinema, movie, booking, payment">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Page</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<style>
/* ========================================================
    INCLUDED CSS FOR DARK THEME (FROM USER GUIDE)
    ========================================================
*/

/* General Body Styles */
body {
    background-color: #141414; /* Very dark grey, almost black */
    color: #fff;
    font-family: 'Montserrat', sans-serif;
}

/* Form Input Fields */
.form-control {
    background-color: #333;
    border: 1px solid #555;
    color: #fff;
    border-radius: 5px;
    padding: 0.75rem 1rem;
    height: auto; /* Ensure height doesn't override padding */
}

.form-control:focus {
    background-color: #444;
    border-color: #e50914;
    color: #fff;
    box-shadow: 0 0 0 0.25rem rgba(229, 9, 20, 0.25);
}

/* Form Labels (Applied to H6 inside labels) */
.form-label, .form-group h6 {
    color: #aaa;
}

/* Primary Button (Login, Register) - Used for Confirm Payment */
.btn-primary {
    background-color: #e50914;
    border-color: #e50914;
    font-weight: bold;
    padding: 0.75rem;
    border-radius: 5px;
    width: 100%;
    transition: background-color 0.2s;
}

.btn-primary:hover, .btn-primary:focus {
    background-color: #f6121d;
    border-color: #f6121d;
}

/* --- PAYMENT PAGE CUSTOM DESIGN (payment.php) --- */

/* 1. Overall Section Spacing and Centering */
.payment-section.spad {
    padding-top: 100px; 
    padding-bottom: 100px;
}

/* 2. Main Payment Card/Form Container */
.payment-card {
    background-color: #1f1f1f; /* Dark background matching other cards/sections */
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
    width: 100%;
    max-width: 700px; 
    border: 1px solid #333;
}
/* Overriding Bootstrap card classes for consistency */
.card {
    background-color: #1f1f1f;
    border: 1px solid #333;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
}
.card-header, .card-footer {
    background-color: #1f1f1f !important;
    border-color: #333 !important;
}

/* 3. Section Titles */
.page-title { 
    color: #fff; 
    font-weight: 800;
    margin-bottom: 2rem;
    border-bottom: 2px solid #e50914; /* Red accent line for page title */
    padding-bottom: 10px;
}

.card-header h5 {
    color: #e50914 !important; /* Red accent for Booking Summary title */
    font-weight: bold;
    margin-bottom: 1rem !important;
}

/* 4. Booking Summary Details */
.booking-summary-details {
    padding: 0 1rem 1rem;
    margin-bottom: 1rem;
    border-bottom: 1px dashed #333; /* Darker separator line */
    color: #aaa; /* Default text color for details */
    font-size: 0.95rem;
}
.booking-summary-details:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}
.booking-summary-details strong {
    color: #fff; /* Highlight labels */
    font-weight: 700;
}

/* 5. Input Group Prepend/Append Styling (Not strictly used in this version, but good to keep) */
.input-group-prepend .input-group-text, .input-group-append .input-group-text {
    background-color: #333;
    border-color: #555;
    color: #e50914; /* Red icon color */
    border-radius: 5px 0 0 5px;
}
.input-group-append .input-group-text {
    border-radius: 0 5px 5px 0;
}

/* 6. Amount Payable Box (The Highlighted Price Box) */
/* Using the .front class provided by user for the total box */
.front { 
    background-color: #141414; /* Slightly darker than the card, overriding #EDF979 */
    color: #fff;
    padding: 15px;
    border-radius: 0.5rem;
    font-size: 1.2rem;
    font-weight: 700;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid #e50914; /* Red accent border */
    margin: 15px 0; /* Add margin for spacing */
}
.front .price {
    color: #e50914; /* Highlight the price in red */
    font-size: 1.4rem;
    float: none; /* Clear previous float if any */
}
.front font:first-child {
    text-align: left;
}
.front font:last-child {
    text-align: right;
}


/* 7. Purchase Button */
.subscribe {
    /* Inherits .btn-primary */
    height: 50px;
}

/* 8. Validation Messages */
[id^='validate'], #msg {
    font-size: 0.85rem;
    color: #f6121d; /* Use the red accent for errors */
    margin-top: 5px;
}
</style>
</head>
<body>

<div class="container py-5 payment-section spad">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="page-title">BOOKING & PAYMENT</h1>
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card payment-card">
                
                <div class="card-header pt-4 pb-2">
                    <h5 class="font-weight-bold mb-3">Booking Summary</h5>
                    <div class="row">
                        
                        <?php
                        include_once 'Database.php'; 
                        
                        $username = $_SESSION['uname'];
                        $price = 0;
                        
                        // Check if booking data was submitted via POST
                        if(isset($_POST['submit'])){
                            $show = $_POST['show'];
                            $movie = $_POST['movie'];
                            $seats_str = $_POST['seats']; // Changed to use the 'seats' field from seatbooking.php
                            $total_seats = $_POST['totalseat'];
                            $seats = explode(",", $seats_str);
                            
                            // *** CORRECTED PRICE CALCULATION LOGIC (New PHP Rates) ***
                            foreach ($seats as $seat) {
                                // Skip empty array elements if the seat string ends with a comma
                                if (empty($seat)) continue; 
                                
                                $row_char = strtoupper(substr(trim($seat), 0, 1));
                                
                                switch ($row_char) {
                                    case 'A':
                                        $price += 600; // Platinum: PHP 600
                                        break;
                                    case 'B':
                                    case 'C':
                                    case 'D':
                                    case 'E':
                                    case 'F':
                                        $price += 450; // Gold: PHP 450
                                        break;
                                    case 'G':
                                    case 'H':
                                    case 'I':
                                        $price += 350; // Silver: PHP 350
                                        break;
                                }
                            }

                            // Fetch user and theater details
                            $result = mysqli_query($conn, "SELECT u.username, u.email, u.mobile, u.city, t.theater FROM user u INNER JOIN theater_show t ON u.username = '".$username."' WHERE t.show = '".$show."'");
                            
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_array($result)) {
                                    echo '
                                    <div class="col-md-6 booking-summary-details">
                                        <strong>User Details</strong><br>
                                        Your Username: '.$row['username'].'<br>
                                        Phone no.: '.$row['mobile'].'<br>
                                        Email: '.$row['email'].'<br>
                                        City: '.$row['city'].'
                                    </div>
                                    <div class="col-md-6 booking-summary-details">
                                        <strong>Booking Details</strong><br>
                                        Movie Name: '.$movie.'<br>
                                        Theater: '.$row['theater'].'<br> 
                                        Show Time: '.$show.'<br>
                                        Total Seats: '.$total_seats.'<br>
                                    </div>
                                    <div class="col-12 mt-3 booking-summary-details">
                                        <strong>Seats Selected:</strong> '.$seats_str.'<br>
                                        Payment Date: '.date("D, m-d-Y").'<br>
                                        Booking Date: '.date("D, m-d-Y", strtotime('+1 day')).'
                                    </div>';
                                }
                            } else {
                                echo '<div class="col-12"><p class="text-danger">Error fetching user/show details.</p></div>';
                            }
                        } else {
                            echo '<div class="col-12"><p class="text-danger">No booking data submitted.</p></div>';
                        }
                        ?>
                        
                        <input type="hidden" id="movie" value="<?php echo isset($movie) ? $movie : ''; ?>">
                        <input type="hidden" id="time" value="<?php echo isset($show) ? $show : ''; ?>">
                        <input type="hidden" id="seat" value="<?php echo isset($seats_str) ? $seats_str : ''; ?>">
                        <input type="hidden" id="totalseat" value="<?php echo isset($total_seats) ? $total_seats : ''; ?>">
                        <input type="hidden" id="price" value="<?php echo $price; ?>">
                    </div>
                </div> 
                
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3" style="color:#fff;">Card Details</h5>
                    <div id="credit-card" class="tab-pane fade show active">
                        
                        <div class="form-group"> 
                            <label for="card_name"><h6>Card Owner</h6></label> 
                            <input type="text" id="card_name" name="card_name" placeholder="Card Owner Name" class="form-control"> 
                            <div id="validatecardname"></div>
                        </div>
                        
                        <div class="form-group"> 
                            <label for="card_number"><h6>Card Number</h6></label>
                            <div class="input-group"> 
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                                </div>
                                <input type="text" id="card_number" name="card_number" placeholder="Valid card number (e.g., 16 digits)" class="form-control"> 
                            </div>
                            <div id="validatecardnumber"></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group"> 
                                    <label><span><h6>Expiration Date (MM/DD/YYYY)</h6></span></label>
                                    <input type="date" id="ex_date" name="ex_date" class="form-control">
                                    <div id="validateexdate"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4"> 
                                    <label data-toggle="tooltip" title="Three or four digit CV code on the back of your card">
                                        <h6>CVV <i class="fa fa-question-circle"></i></h6>
                                    </label> 
                                    <input type="number" id="cvv" class="form-control" placeholder="123"> 
                                    <div id="validatecvv"></div>
                                </div>
                            </div>
                        </div>
                        <div id="msg"></div>
                    </div> 
                </div> 
                
                <div class="card-footer pt-3 pb-4">
                    <div class="front">
                        <font>Amount Payable:</font>
                        <font class="price">PHP.<?php echo number_format($price, 2);?>/-</font>
                    </div>
                    
                    <button type="submit" id="payment" class="subscribe btn btn-primary btn-block shadow-sm mt-3 btn-purchase-final"> Confirm Payment </button>
                </div> 
                
            </div>
        </div>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript">
/* ... (Your existing JavaScript remains unchanged, as it correctly uses the PHP-calculated price) ... */
$(document).ready(function(){
    // Enable Bootstrap Tooltips
    $('[data-toggle="tooltip"]').tooltip(); 

    // Function to display error message
    function displayError(id, message) {
        $("#" + id).html("<font color='#f6121d'>" + message + "</font>"); // Use the theme red
        return false;
    }

    $("#payment").click(function(e){
        e.preventDefault(); // Prevent default button action

        var movie = $("#movie").val().trim();
        var time = $("#time").val().trim();
        var seat = $("#seat").val().trim();
        var totalseat = $("#totalseat").val().trim();
        var price = $("#price").val().trim();
        var card_name = $("#card_name").val().trim();
        var card_number = $("#card_number").val().trim();
        var ex_date = $("#ex_date").val().trim();
        var cvv = $("#cvv").val().trim();
        var isValid = true;
        
        // Clear previous errors
        $("[id^='validate']").empty();
        $("#msg").empty();
        
        // Validation Checks (CORRECTED MESSAGES)
        if(card_name == '') {
            displayError("validatecardname", "!Card owner name is required.");
            isValid = false;
        }
        // Note: Client-side card number validation is still basic (not checking 16 digits)
        if(card_number == '') {
            displayError("validatecardnumber", "!Card number is required.");
            isValid = false;
        }
        if(ex_date == '') {
            displayError("validateexdate", "!Expiration date is required.");
            isValid = false;
        }
        if(cvv == '' || cvv.length < 3) {
            displayError("validatecvv", "!Invalid CVV (must be 3 or 4 digits).");
            isValid = false;
        }

        if(!isValid){
            return false;
        }

        // AJAX Call for Payment Processing
        $.ajax({
            url:'payment_form.php', // Assuming this is the script to process the payment and save the booking
            type:'post',
            data:{
                movie:movie,
                time:time,
                seat:seat,
                totalseat:totalseat,
                price:price,
                card_name:card_name,
                card_number:card_number,
                ex_date:ex_date,
                cvv:cvv,
            },
            success:function(response){
                if(response.trim() == '1'){
                    // Assuming '1' means success
                    window.location = "tickes.php";
                } else {
                    // Handle failure or server-side validation error
                    displayError("msg", "!Payment Failed. Please check your details or try again.");
                }
            },
            error: function() {
                displayError("msg", "!An unexpected error occurred. Please try again later.");
            }
        });
    });
});
</script>
</body>
</html>