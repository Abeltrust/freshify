<?php
include('includes/db.php'); // DB connection
include('includes/init.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']);
    $category = htmlspecialchars($_POST['category']);
    $description = htmlspecialchars($_POST['description']);
    
    // Handle file upload
    $image = $_FILES['image'];
    $imageName = time() . '_' . basename($image['name']);
    $imageTmp = $image['tmp_name'];
    $uploadDir = 'uploads/product_images/';
    $imagePath = $uploadDir . $imageName;

    // Create directory if not exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Check and upload
    if (move_uploaded_file($imageTmp, $imagePath)) {
        $stmt = $pdo->prepare("INSERT INTO products (name, price, category, image, description) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$name, $price, $category, $imageName, $description])) {
            header("Location: products.php?success=1");
            exit;
        } else {
            echo "Error inserting product into database.";
        }
    } else {
        echo "Failed to upload image. Please check folder permissions.";
    }
}
?>
