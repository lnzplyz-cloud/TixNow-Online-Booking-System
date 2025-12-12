<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Register - MovieBook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="auth-container">
        <div class="auth-card" style="max-width: 700px;">
            <a href="./index.html"><img src="img/logo.png" alt="MovieBook Logo" class="logo"></a>
            <h2>Create Account</h2>
            <form id="registerForm" action="register.php" method="post" enctype="multipart/form-data" onsubmit="return validate();">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                        <div id="nameerror" class="text-danger mt-1"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                        <div id="emailerror" class="text-danger mt-1"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="number" name="number" placeholder="Enter your phone number">
                        <div id="numbererror" class="text-danger mt-1"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city">
                        <div id="cityerror" class="text-danger mt-1"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Create a password">
                        <div id="passworderror" class="text-danger mt-1"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm your password">
                        <div id="cpassworderror" class="text-danger mt-1"></div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="image" class="form-label">Profile Image (Optional)</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="submit">REGISTER</button>
                <div class="text-center mt-3">
                    <a href="login_form.php" class="text-white-50">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>

<script type="text/javascript">
function validate() {
    // Clear previous errors
    document.getElementById("nameerror").innerHTML = "";
    document.getElementById("emailerror").innerHTML = "";
    document.getElementById("numbererror").innerHTML = "";
    document.getElementById("cityerror").innerHTML = "";
    document.getElementById("passworderror").innerHTML = "";
    document.getElementById("cpassworderror").innerHTML = "";

    var name = document.getElementById("username").value.trim();
    var email = document.getElementById("email").value.trim();
    var number = document.getElementById("number").value.trim();
    var city = document.getElementById("city").value.trim();
    var password = document.getElementById("password").value.trim();
    var cpassword = document.getElementById("cpassword").value.trim();
    var isValid = true;

    // Username validation
    if (name === "") {
        document.getElementById("nameerror").innerHTML = "Username is required.";
        isValid = false;
    } else if (name.length < 3 || name.length > 20) {
        document.getElementById("nameerror").innerHTML = "Username must be between 3 and 20 characters.";
        isValid = false;
    } else if (!/^[a-zA-Z0-9_]+$/.test(name)) {
        document.getElementById("nameerror").innerHTML = "Only letters, numbers, and underscores allowed.";
        isValid = false;
    }

    // Email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "") {
        document.getElementById("emailerror").innerHTML = "Email is required.";
        isValid = false;
    } else if (!emailRegex.test(email)) {
        document.getElementById("emailerror").innerHTML = "Please enter a valid email address.";
        isValid = false;
    }

    // Phone number validation
    if (number === "") {
        document.getElementById("numbererror").innerHTML = "Phone number is required.";
        isValid = false;
    } else if (!/^\d{10}$/.test(number)) {
        document.getElementById("numbererror").innerHTML = "Phone number must be 10 digits.";
        isValid = false;
    }

    // City validation
    if (city === "") {
        document.getElementById("cityerror").innerHTML = "City is required.";
        isValid = false;
    }

    // Password validation
    if (password === "") {
        document.getElementById("passworderror").innerHTML = "Password is required.";
        isValid = false;
    } else if (password.length < 6 || password.length > 15) {
        document.getElementById("passworderror").innerHTML = "Password must be between 6 and 15 characters.";
        isValid = false;
    }

    // Confirm password validation
    if (cpassword === "") {
        document.getElementById("cpassworderror").innerHTML = "Please confirm your password.";
        isValid = false;
    } else if (cpassword !== password) {
        document.getElementById("cpassworderror").innerHTML = "Passwords do not match.";
        isValid = false;
    }

    return isValid;
}
</script>
</body>
</html>
