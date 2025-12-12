<?php 
session_start();
//index.php

include('database_connection.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="All Movie Listing Page">
    <meta name="keywords" content="cinema, movie, booking, list, filter">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Movies</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css"> 
    
    <style>
        /* CSS provided for dark theme and filtering */
        #loading {
            text-align: center;
            padding: 50px 0;
            font-size: 1.2rem;
            color: #fff; /* White text for dark theme */
        }
        .main-page-wrapper {
            padding-top: 50px; /* Add space below the header */
            padding-bottom: 50px;
            background-color: #141414; /* Assuming a dark background */
        }
        /* Style the filter containers */
        .list-group {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #222; /* Darker background for filter box */
            border-radius: 5px;
        }
        .list-group h3 {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 15px;
            text-transform: uppercase;
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
        }
        .list-group-item.checkbox {
            background-color: transparent;
            border: none;
            padding: 5px 0;
            color: #ccc;
        }
        .list-group-item.checkbox label {
            cursor: pointer;
        }
        .list-group-item.checkbox input[type="checkbox"] {
            margin-right: 10px;
        }
        .filter_data {
            /* Ensure a responsive grid layout */
            display: flex; 
            flex-wrap: wrap; 
            margin: 0 -15px;
        }
        /* Custom styles for the breadcrumb section */
        .breadcrumb-option {
            padding: 20px 0;
            margin-bottom: 30px;
        }
        .breadcrumb__text h4 {
            margin-bottom: 5px;
        }
        .breadcrumb__links a {
            text-decoration: none;
        }
        
        /* === NEW STYLE TO MAKE THE RED BUTTON SMALLER === */
        /* Assuming the red button is inside a movie card/item and uses the .site-btn class or similar */
        .filter_data .site-btn, 
        .filter_data .btn-danger,
        .filter_data a.btn {
            display: block; /* Make sure it takes up its own line */
            width: 80%;      /* **Reduced width to 80%** */
            max-width: 200px; /* Set a maximum width for large screens */
            margin: 10px auto 0 auto; /* **Center the button** and add top margin */
            text-align: center;
            padding: 8px 15px; /* Adjust padding for height */
            /* Assuming the red color comes from one of the linked CSS files (e.g., .site-btn or .btn-danger) */
        }
        /* === END NEW STYLE === */
    </style>
</head>

<body>

    <?php 
    include("header.php");
    ?>

    <section class="breadcrumb-option" style="background-color: #333;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4 style="color: #f6121d;">Movie Listings</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php" style="color: #fff;">Home</a>
                            <span style="color: #ccc;">All Movies</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shop spad main-page-wrapper">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-3"> 
                    <div class="shop__sidebar">

                        <div class="list-group sidebar__item">
                            <h3>Category</h3>
                            <?php
                            $query = "
                            SELECT DISTINCT(categroy) FROM add_movie WHERE status = '1' ORDER BY categroy DESC
                            ";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach($result as $row)
                            {
                            ?>
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector categroy" value="<?php echo $row['categroy']; ?>" > <?php echo $row['categroy']; ?></label>
                            </div>
                            <?php    
                            }
                            ?>
                        </div>
                        
                        <div class="list-group sidebar__item">
                            <h3>Language</h3>
                            <?php
                            $query = "
                            SELECT DISTINCT(language) FROM add_movie WHERE status = '1' ORDER BY language DESC
                            ";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach($result as $row)
                            {
                            ?>
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector language" value="<?php echo $row['language']; ?>" > <?php echo $row['language']; ?></label>
                            </div>
                            <?php
                            }
                            ?> 
                        </div>

                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="product__page__content">
                        <div class="row filter_data">
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
 
    <script src="js/main.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    
<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        // Added styling to the loading message
        $('.filter_data').html('<div id="loading"><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:#f6121d;"></i><span class="sr-only">Loading...</span><p>Loading Movies...</p></div>');
        
        var action = 'fetch_data';
        var categroy = get_filter('categroy');
        var language = get_filter('language');
        
        $.ajax({
            url:"allmovie_fetch.php",
            method:"POST",
            data:{action:action, categroy:categroy, language:language},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

});
</script>

</body>

</html>