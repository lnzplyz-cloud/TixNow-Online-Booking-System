<?php
include "Database.php";
session_start();

if (!isset($_POST['username']) || !isset($_POST['password']) || $_POST['username'] == '' || $_POST['password'] == '') {
    echo 0; // Indicate failure due to missing fields
    exit();
}

$username_input = $_POST['username'];
$password_input = $_POST['password'];

// --- Use Prepared Statements to prevent SQL Injection ---
$stmt = $conn->prepare("SELECT password FROM user WHERE username = ?");
$stmt->bind_param("s", $username_input);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // --- Plain-text password comparison (NOT RECOMMENDED FOR PRODUCTION) ---
    if ($password_input === $user['password']) {
        // Password is correct, start the session
        $_SESSION['uname'] = $username_input;
        echo 1;
    } else {
        // Invalid password
        echo 0;
    }
} else {
    // User not found
    echo 0;
}

$stmt->close();
$conn->close();