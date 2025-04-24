<?php
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['products']) && is_array($_POST['products'])) {
    try {
        // Begin a transaction for safety
        $pdo->beginTransaction();

        foreach ($_POST['products'] as $product_id => $quantity) {
            // OPTIONAL: Check if the product exists before deleting
            $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$product_id]);
            $product = $stmt->fetch();

            if ($product) {
                // Delete product from database (based on your requirement)
                $deleteStmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
                $deleteStmt->execute([$product_id]);
            }
        }

        // Clear the cart after successful deletion
        $_SESSION['cart'] = [];

        // Commit the transaction
        $pdo->commit();

        // Success message
       // header("Location: ../checkout.php");

    } catch (Exception $e) {
        // Roll back if something went wrong
        $pdo->rollBack();
        echo '<p>Error processing checkout. Please try again.</p>';
    }
} else {
    //header("Location: ../ca.php");
}
?>
