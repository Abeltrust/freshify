<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        echo "Email already registered!";
        exit;
    }

    
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    $userCount = $stmt->fetchColumn();
    $role = ($userCount == 0) ? 'admin' : htmlspecialchars($_POST['role']); // First user is admin


    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$name, $email, $pass, $role])) {
        header("Location: ../login.php?registered=1");
        exit;
    } else {
        echo "Registration failed. Try again.";
    }
}
?>

