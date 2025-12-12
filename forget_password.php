<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password - MovieBook</title>
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
            <h2>Reset Password</h2>
            <form id="resetForm">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">A valid email is required.</div>
                </div>
                <div class="mb-3">
                    <label for="oldpassword" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
                    <div class="invalid-feedback">Old password is required.</div>
                </div>
                <div class="mb-3">
                    <label for="newpassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newpassword" name="newpassword" required>
                    <div class="invalid-feedback">New password is required.</div>
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                    <div class="invalid-feedback">Please confirm your new password.</div>
                    <div id="cpassword-match-error" class="text-danger mt-1"></div>
                </div>
                <div id="msg" class="text-danger mb-3"></div>
                <button type="submit" class="btn btn-primary" id="submitBtn">SUBMIT</button>
                <div class="text-center mt-3">
                    <a href="login_form.php" class="text-white-50">Back to Login</a>
                </div>
            </form>
        </div>
    </div>

<script>
$(document).ready(function() {
    $("#resetForm").submit(function(e) {
        e.preventDefault();

        var email = $("#email").val().trim();
        var oldpassword = $("#oldpassword").val().trim();
        var newpassword = $("#newpassword").val().trim();
        var cpassword = $("#cpassword").val().trim();
        var isValid = true;

        // Reset previous errors
        $(".form-control").removeClass("is-invalid");
        $("#msg").html("");
        $("#cpassword-match-error").html("");

        if (email === "" || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            $("#email").addClass("is-invalid");
            isValid = false;
        }
        if (oldpassword === "") { $("#oldpassword").addClass("is-invalid"); isValid = false; }
        if (newpassword === "") { $("#newpassword").addClass("is-invalid"); isValid = false; }
        if (cpassword === "") { $("#cpassword").addClass("is-invalid"); isValid = false; }

        if (newpassword !== cpassword) {
            $("#cpassword-match-error").html("New passwords do not match.");
            isValid = false;
        }

        if (!isValid) return;

        $.ajax({
            url: 'forget.php',
            type: 'post',
            data: { email: email, oldpassword: oldpassword, newpassword: newpassword },
            success: function(response) {
                if (response == 1) {
                    alert("Password updated successfully! Redirecting to login page.");
                    window.location = "login_form.php";
                } else {
                    $("#msg").html("Failed to update password. Please check your details.");
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