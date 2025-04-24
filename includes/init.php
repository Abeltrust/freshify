<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=freshify_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
