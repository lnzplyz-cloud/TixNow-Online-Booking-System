<?php
session_start();
// Check for user login
if (!isset($_SESSION['uname'])) {
    header("location:index.php");
    exit; // Always call exit after header redirection
}
// Check if the customer ID is set from the payment script
if (!isset($_SESSION['custemer_id'])) {
    // Redirect or show an error if no recent booking ID exists
    header("location:index.php?error=nobooking");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your TixNow Movie Ticket | Booking Summary</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<style>
/* ========================================================
    TICKET STYLING (Dark Theme)
    ========================================================
*/
body {
    background-color: #141414; /* Very dark grey */
    font-family: 'Montserrat', sans-serif;
    color: #fff;
    padding-top: 50px;
}

.ticket-container {
    max-width: 650px;
    margin: 0 auto;
}

/* Card/Ticket Box */
.ticket-card {
    background: linear-gradient(145deg, #1f1f1f, #2a2a2a); /* Subtle gradient for depth */
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    border: 1px solid #333;
    padding: 0;
}

/* Ticket Header/Logo Area */
.card-header {
    background-color: #e50914; /* Red cinema accent */
    color: #fff;
    border-radius: 15px 15px 0 0;
    padding: 20px 25px;
    text-align: center;
    border-bottom: 2px dashed #000; /* Perforated look */
}

.card-header img {
    margin-bottom: 5px;
}

.card-header h6 {
    margin-top: 5px;
    font-weight: 600;
}

.card-body {
    padding: 25px;
}

/* General Text Styles */
.ticket-title {
    color: #fff;
    font-weight: 800;
    margin-bottom: 30px;
}

/* Metadata Tables (Contact, ID, Date) */
.metadata-table {
    width: 100%;
    margin-bottom: 15px;
    color: #ccc;
    font-size: 0.9rem;
}

.metadata-table td {
    padding: 5px 0;
    width: 50%; /* Equal width columns */
}

/* Divider */
.ticket-divider {
    border-top: 1px solid #333;
    margin: 15px 0 25px 0;
}

/* Movie Title */
.movie-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #e50914;
    text-align: center;
    margin-bottom: 25px;
}

/* Detail Tables (User and Booking Info) */
.detail-table {
    width: 100%;
    margin-bottom: 30px;
}

.detail-table th {
    font-weight: 700;
    color: #fff;
    padding: 8px 10px 8px 0;
    border-bottom: 1px solid #333;
    text-transform: uppercase;
    font-size: 0.85rem;
}

.detail-table td {
    color: #ccc;
    padding: 10px 10px 10px 0;
    font-size: 1rem;
}

.detail-table .row-data {
    color: #fff;
    font-weight: 600;
}

/* Footer Section */
.card-footer {
    background-color: #1f1f1f;
    border-radius: 0 0 15px 15px;
    border-top: 1px solid #333;
    padding: 20px 25px;
}

.btn-print {
    background-color: #333;
    border: 1px solid #555;
    color: #fff;
    font-weight: bold;
    transition: background-color 0.2s;
}

.btn-print:hover {
    background-color: #555;
    color: #fff;
}

/* Media Query for smaller screens */
@media (max-width: 576px) {
    .ticket-container {
        padding: 0 15px;
    }
    .card-header, .card-body, .card-footer {
        padding: 15px;
    }
    .movie-title {
        font-size: 1.5rem;
    }
    .detail-table th, .detail-table td {
        font-size: 0.8rem;
        padding: 8px 5px 8px 0;
    }
}
</style>
</head>
<body>

<div class="container ticket-container">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="ticket-title">TIXNOW E-TICKET SUMMARY</h1>
        </div>
    </div> 
    
    <div class="card ticket-card">
        <?php 
        include "Database.php";
        
        // Fetch data using the booking ID from the session
        $custemer_id = mysqli_real_escape_string($conn, $_SESSION['custemer_id']);
        $query = "SELECT 
                    c.movie, c.booking_date, c.show_time, c.seat, c.totalseat, c.price, 
                    c.payment_date, c.custemer_id, 
                    u.username, u.email, u.mobile, u.city, 
                    t.theater 
                  FROM customers c 
                  INNER JOIN user u ON c.uid = u.id 
                  INNER JOIN theater_show t ON c.show_time = t.show 
                  WHERE custemer_id = '$custemer_id'";
                  
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        
        if ($row) {
            // Data found, display the ticket
            // **UPDATED CONTACT AND LOCATION FOR FILIPINO BRANDING**
            $mobile_contact = '(02) 8-TIX-NOW'; // Manila landline format (849-6669) or TIXNOW
            $location_text = 'TixNow HQ, Makati City, Philippines'; 
            
        ?>
        <div class="card-header">
            <center>
                <img src="img/logo.png" width="40%" alt="TixNow Logo">
                <h6><?php echo $location_text; ?></h6>
            </center>
            
            <table class="metadata-table">
                <tr>
                    <td><i class="fa fa-phone-alt"></i> <?php echo $mobile_contact; ?></td>
                    <td class="text-right"><strong>Reference ID:</strong> <span class="row-data"><?php echo $row['custemer_id'];?></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-right"><strong>Issue Date:</strong> <?php echo $row['payment_date'];?></td>
                </tr>
            </table>
        </div>

        <div class="card-body">
            
            <div class="movie-title">
                <?php echo strtoupper($row['movie']);?>
            </div>

            <h4 style="color:#e50914; font-weight:700;">USER DETAILS</h4>
            <table class="detail-table table-borderless">
                <thead>
                    <tr>
                        <th width="30%">Name</th>
                        <th width="40%">Email</th>
                        <th width="30%">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="row-data"><?php echo $row['username'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['mobile'];?></td>
                    </tr>
                </tbody>
            </table>
            
            <hr class="ticket-divider">

            <h4 style="color:#e50914; font-weight:700;">BOOKING & PAYMENT</h4>
            <table class="detail-table table-borderless">
                <thead>
                    <tr>
                        <th width="25%">Theater</th>
                        <th width="25%">Date</th>
                        <th width="25%">Time</th>
                        <th width="25%">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="row-data">No. <?php echo $row['theater'];?></td>
                        <td><?php echo $row['booking_date'];?></td>
                        <td><?php echo $row['show_time'];?></td>
                        <td class="row-data" style="color:#e50914;">PHP <?php echo number_format($row['price'], 2);?></td>
                    </tr>
                </tbody>
            </table>
            
            <table class="detail-table table-borderless">
                <thead>
                    <tr>
                        <th width="25%">Total Seats</th>
                        <th width="75%">Seat Numbers</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="row-data"><?php echo $row['totalseat'];?></td>
                        <td class="row-data" style="font-size:1.1rem;"><?php echo $row['seat'];?></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        
        <div class="card-footer text-center">
            <button class="btn btn-block btn-print" onclick="window.print();">
                <i class="fa fa-print"></i> PRINT TICKET
            </button>
            <p class="text-white-50 mt-3 mb-0" style="font-size: 0.8rem;">
                *Please present this ticket at the cinema entrance.<br>
                Powered by TixNow, Philippines.
            </p>
        </div>
        <?php 
        } else { 
            // Handle case where ticket data is not found
            echo '<div class="card-body text-center"><h4 class="text-danger">Booking not found. Please contact TixNow support.</h4></div>';
        }
        ?>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
</body>
</html>