<?php
// Ensure session is started in the parent file or start it here if this is the entry point
// session_start(); 
// include('database_connection.php'); // Ensure connection is established if needed here

// Note: I'm wrapping the image display and username text in a new div (.user__profile) 
// for better alignment control.

?>
<div id="preloder">
    <div class="loader"></div>
</div>

<style>
    /* Apply horizontal padding to all main content sections */
    /* Kept your original padding fix */
    .product-page, .about-page, .contact-page, .feedback-page, .login-page, section {
        padding-left: 15px;
        padding-right: 15px;
    }

    /* === Header Specific Styles for Consistency === */
    .header {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1); /* Subtle separator line */
    }

    /* Style for the Logged-in User Area */
    .header__nav__option {
        display: flex;
        align-items: center;
        justify-content: flex-end; /* Align content to the right */
        gap: 10px; /* Space between elements */
    }
    
    .header__nav__option a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 14px;
    }

    /* Styling for the logged-in profile area */
    .user__profile {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .avatar {
        width: 35px; /* Smaller, better-sized avatar */
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #f6121d; /* Red border for emphasis */
    }

    .uname-text {
        color: #f6121d; /* Highlight username in red */
        font-weight: 600;
        margin-right: 5px; /* Space before the logout button */
    }

    /* Style for the Logout button */
    .header__nav__option .btn-outline-light {
        border-color: #f6121d;
        color: #f6121d;
        padding: 4px 10px; /* Smaller button */
        font-size: 12px;
        text-transform: uppercase;
    }
    .header__nav__option .btn-outline-light:hover {
        background-color: #f6121d;
        color: #fff;
    }
    
    /* Style for Sign in / Register links (when logged out) */
    .header__nav__option a:hover {
        color: #f6121d; /* Red hover effect */
    }
    
    /* Ensure the main menu links match the aesthetic */
    .header__menu ul li a {
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        padding: 15px 15px;
        display: block;
        transition: color 0.3s;
    }
    .header__menu ul li:hover a {
        color: #f6121d;
    }

</style>

<header class="header" style="position: sticky; top: 0; z-index: 1000; width: 100%; background: #0b0c2a;">
    <div class="container">
        
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-2">
                <div class="header__logo">
                    <a href="./index.php"><img src="img/logo.png" alt="Logo"></a>
                </div> 
            </div>
            <div class="col-lg-7 col-md-7">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="allmovie.php">All Movie</a></li>
                        <li><a href="about.php">About US</a></li>
                        <li><a href="./feedback.php">Feedback</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <?php
                    // Assuming you have started your session before this header file is included
                    // And Database.php is included correctly here or in the parent file
                    include_once "Database.php";
                    
                    if (isset($_SESSION['uname'])) {
                        $uname = $_SESSION['uname'];
                        
                        // NOTE: You MUST replace this insecure mysqli_query with a prepared statement!
                        $result = mysqli_query($conn,"SELECT image FROM user WHERE username ='".$uname."'");
                        ?>
                        <div class="user__profile">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);
                            if(empty($row['image'])){
                                echo '<img src="img/img_avatar.png" alt="Avatar" class="avatar">';
                            } else {
                                echo '<img src="admin/image/'.$row["image"].'" alt="Avatar" class="avatar">';
                            }
                        } else {
                            // Fallback if user is logged in but record is not found (shouldn't happen)
                            echo '<img src="img/img_avatar.png" alt="Avatar" class="avatar">';
                        }
                        ?>
                        <span class="uname-text"><?php echo htmlspecialchars($_SESSION['uname']);?></span>
                        </div>
                        <a href="logout.php" class="btn btn-sm btn-outline-light">Logout</a>
                        <?php
                    } else {
                        ?>
                        <a href="login_form.php">Sign in</a>
                        <a href="register_form.php">Register</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
</header>