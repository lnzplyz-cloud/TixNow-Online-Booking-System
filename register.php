
<?php
include_once "Database.php";

if (isset($_POST['submit'])) {
    // --- Data Sanitization and Retrieval ---
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['number']);
    $city = trim($_POST['city']);
    // --- Storing plain-text password (NOT RECOMMENDED FOR PRODUCTION) ---
    $password = trim($_POST['password']);

    $filename = ''; // Default to empty string

    // --- Optional Image Upload Handling ---
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0 && $_FILES['image']['size'] > 0) {
        $original_filename = $_FILES['image']['name'];
        $location = 'admin/image/' . basename($original_filename);
        $file_extension = strtolower(pathinfo($location, PATHINFO_EXTENSION));
        $image_ext = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($file_extension, $image_ext)) {
            // To avoid overwriting files, generate a unique name
            $filename = uniqid() . '.' . $file_extension;
            $location = 'admin/image/' . $filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $location)) {
                // File uploaded successfully
            } else {
                // Handle upload error if necessary, for now, we just won't save the filename
                $filename = '';
            }
        }
    }

    // --- Security: Use Prepared Statements to prevent SQL Injection ---
    $stmt = $conn->prepare("INSERT INTO user (`username`, `email`, `mobile`, `city`, `password`, `image`) VALUES (?, ?, ?, ?, ?, ?)");
    // 'ssssss' denotes the types of the variables: s=string
    $stmt->bind_param("ssssss", $username, $email, $mobile, $city, $password, $filename);

    if ($stmt->execute()) {
        // --- Redirect on success ---
        header("Location: login_form.php?registration=success");
        exit(); // Always call exit() after a header redirect
    } else {
        // You can redirect to an error page or show a message
        // For debugging: echo "Error: " . $stmt->error;
        header("Location: register_form.php?error=dberror");
        exit();
    }
    $stmt->close();
    $conn->close();
}
?>