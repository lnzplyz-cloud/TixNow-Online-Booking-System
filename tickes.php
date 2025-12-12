<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Booking Confirmed!</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        body {
            background-color: #141414; /* Dark background */
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            margin: 0;
        }
        .confirmation-box {
            background-color: #1f1f1f;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(229, 9, 20, 0.4); /* Red glow for excitement */
            max-width: 600px;
        }
        .confirmation-box h1 {
            color: #4CAF50; /* Green for success */
            font-weight: 800;
            margin-bottom: 20px;
            font-size: 2.5rem;
        }
        .confirmation-box h3 a {
            color: #e50914; /* Red for link */
            text-decoration: none;
            font-weight: 700;
            transition: color 0.2s;
        }
        .confirmation-box h3 a:hover {
            color: #f6121d;
            text-decoration: underline;
        }
        .nav-links a {
            color: #aaa;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1rem;
            transition: color 0.2s;
        }
        .nav-links a:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <center>
            <i class="fa fa-check-circle fa-5x mb-4" style="color: #4CAF50;"></i>
            
            <h1>Congratulations!</h1>
            <p style="font-size: 1.1rem; color: #ccc;">Your payment was successful and your seat has been booked.</p>
            
            <a href="ticket_show.php" target="_blank">
                <h3><i class="fa fa-ticket-alt"></i> View & Print Your Ticket</h3>
            </a>
            
            <hr style="border-top: 1px solid #333; margin: 30px 0;">
            
            <div class="nav-links">
                <a href="index.php"><i class="fa fa-home"></i> Back To Home</a>
                <span>|</span>
                <a href="logout.php"><i class="fa fa-sign-out-alt"></i> Log Out</a>
            </div>
        </center>
    </div>
</body>
</html>