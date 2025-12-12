  <?php
session_start();

        include_once 'Database.php';
        $id = $_GET['pass'];
        $result = mysqli_query($conn,"SELECT * FROM add_movie WHERE id = '".$id."'");
        $row = mysqli_fetch_array($result);
        ?>

<!DOCTYPE html>
<html>
<head>

	    <!-- Css Styles -->
          <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['movie_name'];?> Movie Deatis</title>



    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="  text/css">
    <link rel="stylesheet" href="css/fonts-googleapis.css" type="  text/css">
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

/* Base section padding */
#aboutUs {
    padding: 60px 0;
}

/* ------------------------------------------- */
/* --- 2. MOVIE DETAILS SPECIFIC STYLES --- */
/* ------------------------------------------- */

/* --- Movie Poster Image --- */
.resize-detail {
    max-width: 100%;
    height: auto;
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 5px 15px rgba(229, 9, 20, 0.2); /* Subtle red shadow */
    border: 1px solid #333; /* Subtle border */
}

/* --- Movie Details Table --- */
.content-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 25px;
    background-color: #1f1f1f; /* Dark card background */
    border-radius: 10px;
    overflow: hidden; 
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
}

.content-table thead tr {
    background-color: #e50914; /* Vibrant red header */
    color: white;
    text-align: center;
}

.content-table th {
    padding: 15px;
    font-size: 1.5em;
    font-weight: bold;
}

.content-table tbody tr {
    border-bottom: 1px solid #333; /* Dark separator */
}

.content-table tbody tr:nth-of-type(even) {
    background-color: #141414; /* Alternate dark rows */
}

.content-table td {
    padding: 12px 15px;
    font-size: 1em;
    color: #fff;
}

.content-table tbody tr td:first-child {
    font-weight: 600;
    color: #aaa; /* Lighter text for labels */
    width: 30%; 
}

/* --- Trailer Modal Link --- */
.content-table a[data-toggle="modal"] {
    color: #e50914; /* Red accent color for link */
    font-weight: bold;
}

.content-table a[data-toggle="modal"]:hover {
    color: #fff; /* White on hover */
    text-decoration: underline;
}

/* --- Showtime Links (Time/Booking) --- */
.tiem-link {
    margin-top: 25px;
    padding: 20px;
    border: 1px solid #333;
    border-radius: 10px;
    background-color: #1f1f1f; /* Dark card background */
}

.tiem-link h4 {
    color: #fff;
    font-weight: 700;
    margin-bottom: 15px;
    border-bottom: 2px solid #e50914; /* Red accent line */
    padding-bottom: 5px;
}

.tiem-link a {
    display: inline-block;
    background-color: #e50914; /* Red button color */
    color: white;
    padding: 8px 15px;
    margin-right: 10px;
    margin-bottom: 10px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.2s, transform 0.2s;
}

.tiem-link a:hover {
    background-color: #f6121d; /* Darker red on hover */
    transform: translateY(-2px);
    box-shadow: 0 2px 5px rgba(229, 9, 20, 0.5);
}

/* --- Description Area --- */
.description {
    margin-top: 40px;
    padding: 25px;
    background-color: #1f1f1f; /* Dark card background */
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    border: 1px solid #333;
}

.description h4 {
    color: #fff;
    font-weight: 700;
    margin-bottom: 15px;
    border-bottom: 2px solid #e50914;
    padding-bottom: 5px;
}

.description p {
    line-height: 1.8;
    color: #aaa; /* Lighter text for readability */
    text-align: justify;
}

/* --- Trailer Modal Embed Size --- */
.modal-dialog {
    max-width: 850px;
}
.modal-content embed {
    width: 100% !important; 
    height: 450px;
    border: none;
}

/* Font fix for Shruthi font-family */
font[style*="Shruti"] {
    font-family: 'Montserrat', sans-serif !important;
}

</style>
</head>
<body>
<?php
include("header.php");
?>

<section id="aboutUs">
  <div class="container">
<?php
        include_once 'Database.php';
        $id = $_GET['pass'];
        $result = mysqli_query($conn,"SELECT * FROM add_movie WHERE id = '".$id."'");
        
        
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
        ?>
    <div class="row feature design">
        <div class="col-lg-5"> <img src="admin/image/<?php echo $row['image']; ?>" class="resize-detail" alt="" width="100%"> </div>
      <div class="col-lg-7">
        
        <table class="content-table">
          <thead><tr>
            <th colspan="2">Movie Deatils</th>
          </tr>
        </thead>
       
          <tbody>
          <tr>
            <td>Movie Name</td><td><?php echo $row['movie_name'];?></td>
          </tr>
          <tr>
            <td>Release Date</td><td><?php echo $row['release_date'];?></td>
          </tr>
          <tr>
            <td>Directer Name</td><td><?php echo $row['directer'];?></td>
          </tr>
          <tr>
            <td>Category</td><td><?php echo $row['categroy'];?></td>
          </tr>
          <tr>
            <td>Language</td><td><?php echo $row['language'];?></td>
          </tr>
         
          <tr>
            <td>Trailer</td><td><a data-toggle="modal" data-target="#tailer_modal<?php echo $row['id'];?>">View Trailer</a></td>
            <div class="modal fade" id="tailer_modal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <embed style="width: 820px; height: 450px;" src="<?php echo $row['you_tube_link'];?>"></embed>
    </div>
  </div>
</div> 
          </tr>
          
          </tbody>
            
          
        </table>
        <?php  if($row['action']== "running"){?>
        <div class="tiem-link">
          <h4>Show Book Ticket:</h4><br>
          <?php 
            $time = $row['show'];

            $movie = $row['movie_name'];
            $set_time = explode(",", $time);
            $res = mysqli_query($conn,"SELECT * FROM theater_show");

        if (mysqli_num_rows($res) > 0) {
          while($row = mysqli_fetch_array($res)) {

            if(in_array($row['show'],$set_time)){

              ?><a href="seatbooking.php?movie=<?php echo $movie; ?>&time=<?php echo $row['show'];?>"><?php echo $row['show'];?></a><?php
             
             }
           }
         }
          ?>
        
       
      </div>
      <?php
}
      ?>
      </div>
      
    </div>
    <div class="description">
      <h4>Description</h4>
      <p>
        Jeff Lang (Tobey Maguire), an OBGYN, and his wife Nealy (Elizabeth Banks), who owns a small shop, live in Seattle with their two-year-old son named Miles. Considering a second child, they decide to enlarge their small home and lay expensive new grass in their backyard. Worms in the grass attract raccoons, who destroy the grass, and Jeff goes to great lengths to get rid of the raccoons, mixing poison with a can of tuna. Their neighbor Lila (Laura Linney) tells Jeff that her cat Matthew is missing, and Jeff does not yet realize he may be responsible.
      </p>
    </div>
    <?php
        }
      }
         ?>
    </div>
  
</section>

<?php
include("footer.php");
?>


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
</body>
</html>     