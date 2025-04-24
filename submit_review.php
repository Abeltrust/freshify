<?php
session_start();
include('includes/db.php'); // make sure this connects to your database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $rating = (int) $_POST['rating'];
    $message = trim($_POST['message']);

    if ($name && $rating && $message) {
        $stmt = $conn->prepare("INSERT INTO reviews (name, rating, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $name, $rating, $message);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Thank you for your review!";
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again.";
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "All fields are required.";
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

header("Location: review.php");
exit;
?>
