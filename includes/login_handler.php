<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    // Prepare the query to find the user based on email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Check if the user exists and the password is correct
    if ($user && password_verify($pass, $user['password'])) {
        // Store user data in session
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        // Redirect user based on their role
        if ($_SESSION['user_role'] == 'admin') {
            header("Location: ../admin/index.php");  // Redirect to the admin dashboard
        } else {
            header("Location: ../dashboard.php");  // Redirect to the regular user dashboard
        }
        exit;
    } else {
        echo "Invalid email or password!";
    }
}
?>

