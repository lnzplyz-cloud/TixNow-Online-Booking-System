<?php session_start();  ?>

<!DOCTYPE html>
<html>
    <?php
// ... your existing PHP code ...   

// FUNCTION TO AUTOMATICALLY GENERATE SEATS WITH CORRECT ID AND LABEL
function generate_seats($row_letter, $start_num, $end_num, $booked_seats) {
    $output = '';
    
    // Loop through the seat numbers for the given row
    for ($i = $start_num; $i <= $end_num; $i++) {
        $seat_id = $row_letter . $i; // e.g., 'F12'

        // Check if the seat is booked
        $disabled_attribute = in_array($seat_id, $booked_seats) ? "disabled" : "";

        // Build the <td> element with the correct HTML structure
        $output .= '<td>';
        $output .= '<input type="checkbox" ';
        $output .= 'id="' . $seat_id . '" ';      // <-- The required unique ID
        $output .= 'class="larger" ';
        $output .= 'name="seat[]" ';
        $output .= 'value="' . $seat_id . '" ';
        $output .= $disabled_attribute;           // <-- Disabled attribute
        $output .= '>';
        
        // Add the custom-styled label
        $output .= '<label for="' . $seat_id . '">' . $seat_id . '</label>'; // <-- The required LABEL
        $output .= '</td>';
    }
    return $output;
}
// ... the rest of your PHP code ...
?>
<head>

	<meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo "Movie - ".$_GET['movie'].", Time - ".$_GET['time'];?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">


    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="  text/css">
   <link rel="stylesheet" href="css/style.css" type="text/css">  

   <style>
/* ------------------------------------------- */
/* --- 1. BASE DARK THEME STYLES (from guide) --- */
/* ------------------------------------------- */
body {
    background-color: #141414; /* Very dark grey, almost black */
    color: #fff;
    font-family: 'Montserrat', sans-serif;
}

/* General Link/Text Color Adjustments for Dark Theme */
a {
    color: #e50914; /* Default links are red */
    transition: color 0.2s;
}

a:hover {
    color: #f6121d;
}

/* Input Styles */
.form-control, input[type="text"] {
    background-color: #333 !important;
    border: 1px solid #555 !important;
    color: #fff !important;
    border-radius: 5px;
    padding: 0.75rem 1rem !important;
}

.form-control:focus, input[type="text"]:focus {
    background-color: #444 !important;
    border-color: #e50914 !important;
    box-shadow: 0 0 0 0.25rem rgba(229, 9, 20, 0.25) !important;
}

/* Primary Button Styles */
.btn-primary, input[type="submit"] {
    background-color: #e50914 !important;
    border-color: #e50914 !important;
    font-weight: bold;
    padding: 0.75rem !important;
    border-radius: 5px !important;
    width: 100% !important;
    transition: background-color 0.2s !important;
    color: white !important; /* Ensure text is white */
}

.btn-primary:hover, input[type="submit"]:hover {
    background-color: #f6121d !important;
    border-color: #f6121d !important;
}

/* Modal Styling for Login Prompt */
.modal-content {
    background-color: #1f1f1f;
    color: #fff;
}
.modal-content h3 {
    padding: 20px;
    text-align: center;
    color: #e50914;
}
.modal-content a.btn {
    margin: 0 auto 20px auto;
    width: 50%;
    display: block;
}


/* ------------------------------------------- */
/* --- 2. SEAT BOOKING SPECIFIC STYLES --- */
/* ------------------------------------------- */

/* Style for the screen area */
.screen {
    width: 80%;
    margin: 0 auto 40px auto;
    height: 30px;
    background-color: #e50914; /* Red accent color */
    color: white;
    text-align: center;
    line-height: 30px;
    border-radius: 5px;
    font-size: 1.2em;
    font-weight: bold;
    box-shadow: 0 4px 15px rgba(229, 9, 20, 0.4);
}

/* Price Category Headers */
.seat_type {
    font-size: 1.1em;
    font-weight: bold;
    color: #fff;
    margin-top: 25px;
    margin-bottom: 15px;
    padding: 5px 10px;
    background-color: #1f1f1f;
    border-left: 5px solid #e50914; /* Red highlight */
    display: inline-block;
    border-radius: 3px;
}

/* Style for the seat tables */
table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 5px; /* Adds space between seat cells */
}

/* Style for table cells containing seats */
table td {
    padding: 0;
    text-align: center;
}

/* Style for row letters (e.g., G, F, E) */
.line {
    font-weight: bold;
    font-size: 1.1em;
    color: #aaa !important; /* Light grey color for row labels */
    padding-right: 10px;
}

/* HIDE DEFAULT CHECKBOX */
.larger {
    opacity: 0;
    width: 0; 
    height: 0;
    position: absolute;
}

/* CUSTOM SEAT BUTTONS (Using label associated with the checkbox) */
.larger + label {
    display: inline-block;
    width: 28px;
    height: 28px;
    line-height: 28px;
    border: 2px solid #555;
    border-radius: 4px;
    cursor: pointer;
    background-color: #333; /* Dark available seat */
    color: #fff;
    font-size: 10px;
    font-weight: bold;
    text-align: center;
    transition: all 0.2s;
}

/* Style for AVAILABLE Seats on Hover */
.larger + label:hover {
    background-color: #e50914; /* Red on hover */
    border-color: #e50914;
    transform: scale(1.05);
}

/* Style for SELECTED Seats */
.larger:checked + label {
    background-color: #4CAF50; /* Green (selected) */
    border-color: #4CAF50;
    content: '✓'; 
}

/* Style for DISABLED (Booked) Seats */
.larger:disabled + label {
    background-color: #343a40; /* Darker grey (Booked) */
    border-color: #1f1f1f;
    cursor: not-allowed;
    opacity: 0.6;
    content: 'X'; 
}

/* --- ORDER SUMMARY TABLE STYLES --- */
.col-lg-6 > table {
    margin-top: 30px;
    border: 1px solid #333;
    border-radius: 8px;
    overflow: hidden;
    background-color: #1f1f1f; /* Dark card background */
}
.col-lg-6 > table td {
    padding: 10px;
    vertical-align: middle;
    border-bottom: 1px solid #333;
}
.col-lg-6 > table tr:last-child td {
    border-bottom: none;
}
.col-lg-6 > table font[color="blue"] {
    color: #e50914 !important; /* Use red accent for labels */
    font-weight: bold;
}

/* Background colors for Movie and Time details */
.col-lg-6 > table td[bgcolor="79F9E2"],
.col-lg-6 > table td[bgcolor="ECF68C"] {
    background-color: #141414 !important; /* Match body background */
    border: 1px solid #333;
    border-radius: 4px;
}
</style>

   <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </script>

   <script type="text/javascript">
        $(document).ready(function(){
            $('.larger').click(function(){
                var text= "";
              
                $('.larger:checked').each(function(){
                    text+=$(this).val()+ ',';

                });
                text=text.substring(0,text.length-1);
                $('#selectedtext').val(text);

                var count = $("[type='checkbox']:checked").length;
                $('#count').val($("[type='checkbox']:checked").length);

                if(count == 8){
                    document.getElementById('notvalid').innerHTML="Maximun seat seleact 8"
            return false;
                }

        });
        });

        
        </script>
</head>
    <div>
   <?php
        include_once 'Database.php';
            $time = $_GET['time'];
            $movie=$_GET['movie'];
            $date= date("Y-m-d");

            $result = mysqli_query($conn,"SELECT * FROM customers WHERE show_time = '".$time."' && movie = '".$movie."' && payment_date = '".$date."'");

      ?><form method="post"><input type="hidden" name="t1" value="<?php      
      while($row = mysqli_fetch_array($result)) {
        echo $row['seat'];
        echo ",";
      }?>">
      <center><input type="submit" name="submit" class="btn btn-primary" value="Check Avaliable Seat"></center></form>
      <hr>

<form action="payment.php" method="post">
<div class="container">
    <?php if(isset($_POST['submit'])){
                    $seats= $_POST['t1'];
                    $seats1 = explode(",", $seats);
                 ?>       
    <div class="row">
        <div class="col-lg-6">
    <div class="seatCharts-container">
     
                
      
        <div class="front">SCREEN</div>
         <center><p id="notvalid" style="color: red; font-size: 20px;"></p></center>
       <div class="seat_type">Silver : PHP 350.00</div>
<div id="validated"></div> 
<div class="row">
    <div class="col-lg-7 col-md-7 col-sm-5">
        <table>
            <tr>
                <td class="line" style="width: 10%;">I</td>
                <?php echo generate_seats('I', 1, 6, $seats1); ?>
            </tr>
            <tr>
                <td class="line" style="width: 10%;">H</td>
                <?php echo generate_seats('H', 1, 6, $seats1); ?>
            </tr>
            <tr>
                <td class="line" style="width: 10%;">G</td>
                <?php echo generate_seats('G', 1, 6, $seats1); ?>
            </tr>
        </table>
    </div>
    
    <div class="col-lg-5 col-md-5 col-sm-7">
        <div class="seattable" id="silver">
            <table>
                <tr>
                    <td class="line" style="width: 10%;color:white;">I</td>
                    <?php echo generate_seats('I', 7, 12, $seats1); ?>
                </tr>
                <tr>
                    <td class="line" style="width: 10%;color:white;">H</td>
                    <?php echo generate_seats('H', 7, 12, $seats1); ?>
                </tr>
                <tr>
                    <td class="line" style="width: 10%;color:white;">G</td>
                    <?php echo generate_seats('G', 7, 12, $seats1); ?>
                </tr>
            </table>
        </div>
    </div>
</div>
      <div class="seat_type">PHP 450.00</div>

<div class="row">
    <div class="col-lg-7 col-md-7 col-sm-5">
        <table>
            <tr>
                <td class="line" style="width: 10%;">F</td>
                <?php echo generate_seats('F', 1, 6, $seats1); ?>
            </tr>
            <tr>
                <td class="line" style="width: 10%;">E</td>
                <?php echo generate_seats('E', 1, 6, $seats1); ?>
            </tr>
            <tr>
                <td class="line" style="width: 10%;">D</td>
                <?php echo generate_seats('D', 1, 6, $seats1); ?>
            </tr>
            <tr>
                <td class="line" style="width: 10%;">C</td>
                <?php echo generate_seats('C', 1, 6, $seats1); ?>
            </tr>
            <tr>
                <td class="line" style="width: 10%;">B</td>
                <?php echo generate_seats('B', 1, 6, $seats1); ?>
            </tr>
        </table>
    </div>
    
    <div class="col-lg-5 col-md-5 col-sm-7">
        <div class="seattable" id="gold">
            <table>
                <tr>
                    <td class="line" style="width: 10%;color:white;">F</td>
                    <?php echo generate_seats('F', 7, 12, $seats1); ?>
                </tr>
                <tr>
                    <td class="line" style="width: 10%;color:white;">E</td>
                    <?php echo generate_seats('E', 7, 12, $seats1); ?>
                </tr>
                <tr>
                    <td class="line" style="width: 10%;color:white;">D</td>
                    <?php echo generate_seats('D', 7, 12, $seats1); ?>
                </tr>
                <tr>
                    <td class="line" style="width: 10%;color:white;">C</td>
                    <?php echo generate_seats('C', 7, 12, $seats1); ?>
                </tr>
                <tr>
                    <td class="line" style="width: 10%;color:white;">B</td>
                    <?php echo generate_seats('B', 7, 12, $seats1); ?>
                </tr>
            </table>
        </div>
    </div>
</div>
    
     <div class="seat_type">Platinum : PHP 600.00</div>

<div class="row">
    <div class="col-lg-7 col-md-7 col-sm-5">
        <table>
            <tr>
                <td class="line" style="width: 10%;">A</td>
                <?php echo generate_seats('A', 1, 6, $seats1); ?>
            </tr>
        </table>
    </div>
    
    <div class="col-lg-5 col-md-5 col-sm-7">
        <div class="seattable">
            <table>
                <tr>
                    <td class="line" style="width: 10%;color:white;">A</td>
                    <?php echo generate_seats('A', 7, 12, $seats1); ?>
                </tr>
            </table>
        </div>
    </div>
</div>


    </div>
</div>
    <div class="col-lg-6">
       
        <table>
            <tr><td width="50%"><font color="blue" size="5px" style="font-family: Shruti;">Movie:</font></td>
                <td bgcolor="79F9E2"><center><font size=5 style="font-family: Shruti; "><?php echo $_GET['movie'];?></font></center></td>
            </tr>
            <tr><td width="50%"><font color="blue" size="5px" style="font-family: Shruti;">Time:</font></td>
                <td bgcolor="ECF68C"><center><font size=5 style="font-family: Shruti;"><?php echo $_GET['time'];?></font></center></td>
            </tr>
            <tr><td width="50%"><font color="blue" size="5px" style="font-family: Shruti;">Seat:</font></td>
                <td> <input type="text" id="selectedtext" name="seats" placeholder="selected checkboxs"></td>
            </tr>
            <tr><td width="50%"><font color="blue" size="5px"style="font-family: Shruti;">Total Seat:</font></td>
               <td> <input type="text" id="count" name="totalseat" placeholder="Total Seats"></td>
            </tr>  
            <input type="hidden" name="movie" value="<?php echo $_GET['movie'];?>">
            <input type="hidden" name="show" value="<?php echo $_GET['time'];?>">
</table>
<?php 
if (!isset($_SESSION['uname'])) {
  ?>
<div class="col-lg-12">
            <div class="form-group">
                     <a data-toggle="modal" data-target="#tailer_modal" class="form-control btn btn-primary py-2"><font style="color:white;">Payment Now</a>
                  </div>
    </div>
      <div class="modal fade" id="tailer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <h3>You need to login</h3>
      <a class="btn btn-primary btn-sm" href="login_form.php">Login</a>
    </div>
  </div>
</div> 
  <?php
}else{
?>
   <div class="col-lg-12">
            <div class="form-group">
                    <input type="submit" value="Payment Now" name="submit" class="form-control btn btn-primary py-2">
                  </div>
    </div>


<?php
}
?>
<div id="count1"></div>
    </div>
</div>
    <?php
}
?>
</div>


         
</form>

</div>
    <!-- Js Plugins -->
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
$(document).ready(function(){
    // Function runs whenever any seat checkbox is clicked
    $('.larger').click(function(){
        
        var selectedSeats = [];
        var totalPrice = 0; 
        
        // 1. Iterate through all currently checked seats to calculate total
        $('.larger:checked').each(function(){
            var seatValue = $(this).val(); 
            selectedSeats.push(seatValue);
            
            // Determine price based on row letter (first character of the seat value)
            var row = seatValue.charAt(0);
            
            // --- UPDATED PRICE CALCULATION LOGIC (Philippines 2025 Rates) ---
            if (row == 'A') {
                totalPrice += 600; // Platinum: PHP 600
            } else if (row == 'B' || row == 'C' || row == 'D' || row == 'E' || row == 'F') {
                totalPrice += 450; // Gold: PHP 450
            } else if (row == 'G' || row == 'H' || row == 'I') {
                totalPrice += 350; // Silver: PHP 350
            } 
            // ------------------------------------------------------------------
        });

        var count = selectedSeats.length;
        var selectedText = selectedSeats.join(',');
        
        // 2. Enforce Maximum Seat Limit (Max 8 seats)
        if(count > 8){
            // Prevent the 9th seat from being checked and show error message
            $(this).prop('checked', false); 
            
            // Recalculate current valid selections after unchecking the rejected seat
            selectedSeats = [];
            totalPrice = 0;
            $('.larger:checked').each(function(){
                var seatValue = $(this).val();
                var row = seatValue.charAt(0);
                
                // Recalculate price for valid seats using new rates
                if (row == 'A') {
                    totalPrice += 600;
                } else if (row == 'B' || row == 'C' || row == 'D' || row == 'E' || row == 'F') {
                    totalPrice += 450;
                } else if (row == 'G' || row == 'H' || row == 'I') {
                    totalPrice += 350;
                } 
                selectedSeats.push(seatValue);
            });
            
            selectedText = selectedSeats.join(',');
            count = selectedSeats.length;

            document.getElementById('notvalid').innerHTML = "Maximum seat select is 8";
        } else {
             document.getElementById('notvalid').innerHTML = ""; // Clear message if count is valid
        }
        
        // 3. Update the summary form fields
        $('#selectedtext').val(selectedText);
        $('#count').val(count);
        $('#totalamount').val(totalPrice.toFixed(2)); // Total price updated and set to 2 decimal places
    });
});
</script>
</body>
</html>
