<?php
include "Database.php";

if (!isset($_POST['email'], $_POST['oldpassword'], $_POST['newpassword'])) {
    echo 0;
    exit();
}

$email = $_POST['email'];
$oldpassword = $_POST['oldpassword'];

// --- Security: Use Prepared Statements ---
$stmt = $conn->prepare("SELECT id, password FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // --- Plain-text password comparison (NOT RECOMMENDED FOR PRODUCTION) ---
    if ($oldpassword === $user['password']) {
        $newpassword = $_POST['newpassword'];

        $update_stmt = $conn->prepare("UPDATE `user` SET `password` = ? WHERE `id` = ?");
        $update_stmt->bind_param("si", $newpassword, $user['id']);
        if ($update_stmt->execute()) {
            echo 1; // Success
        }
    }
}

echo 0; // Indicate failure if any step above fails
$conn->close();