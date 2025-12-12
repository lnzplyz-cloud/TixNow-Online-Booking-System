<!DOCTYPE html>
<html>
<head>
    <title>Login - MovieBook</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <a href="./index.html"><img src="img/logo.png" alt="MovieBook Logo" class="logo"></a>
            <h2>Member Login</h2>
            <form id="loginForm">
                <div class="mb-3">
                    <label for="username" class="form-label">User ID</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    <div class="invalid-feedback">User ID is required.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <div class="invalid-feedback">Password is required.</div>
                </div>
                <div id="msg" class="text-danger mb-3"></div>
                <button type="submit" class="btn btn-primary" id="login">LOGIN</button>
            </form>
            <div class="d-flex justify-content-between mt-3">
                <a href="register_form.php" class="text-white-50">Register now</a>
                <a href="forget_password.php" class="text-white-50">Forgot Password?</a>
            </div>
        </div>
    </div>

<script>
$(document).ready(function() {
    $("#loginForm").submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        var username = $("#username").val().trim();
        var password = $("#password").val().trim();
        var isValid = true;

        // Reset previous errors
        $(".form-control").removeClass("is-invalid");
        $("#msg").html("");

        if (username === "") {
            $("#username").addClass("is-invalid");
            isValid = false;
        }

        if (password === "") {
            $("#password").addClass("is-invalid");
            isValid = false;
        }

        if (!isValid) {
            return;
        }

        $.ajax({
            url: 'login.php',
            type: 'post',
            data: { username: username, password: password },
            success: function(response) {
                if (response == 1) {
                    window.location = "index.php";
                } else {
                    $("#msg").html("Invalid User ID or Password.");
                }
            },
            error: function() {
                $("#msg").html("An error occurred. Please try again.");
            }
        });
    });
});
</script>
</body>
</html>