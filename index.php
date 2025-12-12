<?php
session_start();
// Include the database connection setup
include_once 'Database.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Movie Ticket Booking System Home">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TixNow | Movie Ticket Booking System</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">


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
// Include the header (assumed to be styled correctly)
include("header.php");
?>

<div class="container-fluid p-0 mb-5">
   <div class="hero-banner-wrapper">
       <img src="image/theatre_2.jpg" alt="Movie Theater Banner" class="img-fluid w-100" style="max-height: 450px; object-fit: cover;">
   </div>
</div>

<section class="movies-section spad pt-0">
    <div class="container">
        <h2 class="section-title-custom text-white mb-4">Now Showing</h2> 
         <div class="row">

        <?php
        // Fetch all movies once to loop through them
        $all_movies_result = mysqli_query($conn, "SELECT * FROM add_movie WHERE status = '1' ORDER BY id DESC");
        
        if (mysqli_num_rows($all_movies_result) > 0) {
            // Reset pointer for running movies
            mysqli_data_seek($all_movies_result, 0); 

            while($row = mysqli_fetch_array($all_movies_result)) {
                if($row['action'] == "running"){
                ?>
                
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="movie-card-item">
                        <div class="movie-card-img-wrapper">
                             <div class="play-overlay">
                                <a data-toggle="modal" data-target="#tailer_modal<?php echo $row['id'];?>">
                                    <i class="fa fa-play-circle fa-4x text-white-50" aria-hidden="true"></i>
                                </a>
                            </div>
                            <img src="admin/image/<?php echo $row['image']; ?>" alt="<?php echo $row['movie_name']; ?>" class="movie-card-img">
                        </div>
                        
                        <div class="movie-card-body text-center">
                            <h5 class="movie-title mt-2 mb-1"><?php echo $row['movie_name'];?></h5>
                            <p class="text-white-50 mb-3"><?php echo $row['language'];?></p>
                            
                            <a href="movie_details.php?pass=<?php echo $row['id'];?>" class="btn btn-primary w-100">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="tailer_modal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document"> <div class="modal-content bg-dark border-0">
                             <div class="modal-header border-0 pb-0">
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" style="width: 100%; height: 500px;" 
                                            src="<?php echo $row['you_tube_link'];?>" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                
        <?php
                }
            }
        } else {
            echo '<div class="col-12"><h4 class="text-white-50 text-center mt-5">No Running Movies available.</h4></div>';
        }
        ?>
        </div>
    </div> 
</section>

<section class="movies-section spad pt-0">
    <div class="container">
        <h2 class="section-title-custom text-white mb-4">Coming Soon</h2>
        <div class="row">
        <?php
        // Reset pointer and loop again for upcoming movies
        if (mysqli_num_rows($all_movies_result) > 0) {
            mysqli_data_seek($all_movies_result, 0); 
            
            while($row = mysqli_fetch_array($all_movies_result)) {
                if($row['action'] == "upcoming"){
                ?>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="movie-card-item p-2">
                        <div class="movie-card-img-wrapper" style="height: 250px;">
                           <img class="movie-card-img" src="admin/image/<?php echo $row['image']; ?>" alt="<?php echo $row['movie_name']; ?>">
                        </div>
                        <div class="text-center mt-2">
                          <h6 class="text-white-50 mb-0"><?php echo $row['movie_name'];?></h6>
                          <small class="text-secondary">Director: <?php echo $row['directer'];?></small>
                        </div>
                    </div>
                </div>
        <?php
                }
            }
        } else {
            echo '<div class="col-12"><h4 class="text-white-50 text-center mt-5">No Upcoming Movies announced.</h4></div>';
        }
        ?>
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

<style>
/* Add custom styles to enhance the homepage, these can be added to style.css 
    or kept here temporarily.
*/
.hero-banner-wrapper {
    overflow: hidden;
    max-height: 450px; /* Standardize banner height */
}

.play-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4); /* Dark overlay */
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0; /* Hidden by default */
    transition: opacity 0.3s ease;
    cursor: pointer;
}

.movie-card-item:hover .play-overlay {
    opacity: 1; /* Show on hover */
}

.play-overlay .fa-play-circle {
    font-size: 5rem; 
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
    transition: transform 0.2s;
}

.play-overlay:hover .fa-play-circle {
    transform: scale(1.1);
}

.modal-content .close {
    opacity: 1;
    text-shadow: none;
    font-size: 2rem;
    padding: 0 15px;
}
</style>

</body>
</html>