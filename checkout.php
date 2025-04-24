<link rel="stylesheet" href="css/style.css">

<?php
include('includes/header.php');
include('includes/db.php');
include('includes/init.php');
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
    include('includes/footer.php');
    exit;
}

// Simulate checkout (in real systems you'd handle payments and order storage)
$_SESSION['cart'] = [];
?>

<div class="checkout">
  <h2>Checkout Successful</h2>
  <p>Thank you for your purchase! Your order has been placed.</p>
  <a href="products.php" class="btn">Continue Shopping</a>
</div>

<style>
  /* Checkout Page Styling */
.checkout {
  max-width: 600px;
  margin: 80px auto;
  padding: 40px 20px;
  background-color: #ffffff;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  border-radius: 12px;
  text-align: center;
}

.checkout h2 {
  font-size: 2rem;
  color: #2e7d32; /* Dark green */
  margin-bottom: 20px;
}

.checkout p {
  font-size: 1.1rem;
  color: #555;
  margin-bottom: 30px;
}

/* Button Styling */
.btn {
  display: inline-block;
  padding: 12px 24px;
  background-color: #56ab2f;
  color: white;
  text-decoration: none;
  font-size: 1rem;
  border-radius: 6px;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #3c7c21;
}

/* Responsive Padding */
@media (max-width: 768px) {
  .checkout {
    margin: 40px 10px;
    padding: 30px 15px;
  }
}

</style>
<?php include('includes/footer.php'); ?>