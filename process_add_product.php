<?php
include('includes/db.php'); // Ensure this file includes your database connection
include('includes/init.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']);
    $category = htmlspecialchars($_POST['category']);
    $description = htmlspecialchars($_POST['description']);
    
    // Handle file upload for image
    $image = $_FILES['image'];
    $imageName = time() . '_' . $image['name'];
    $imageTmp = $image['tmp_name'];
    $imagePath = 'uploads/product_images/' . $imageName;
    
    if (move_uploaded_file($imageTmp, $imagePath)) {
        // Image uploaded successfully
        $stmt = $pdo->prepare("INSERT INTO products (name, price, category, image, description) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$name, $price, $category, $imageName, $description])) {
            header("Location: products.php?success=1");
        } else {
            echo "Error adding product. Please try again.";
        }
    } else {
        echo "Sorry, there was an error uploading your image.";
    }
}
?>
