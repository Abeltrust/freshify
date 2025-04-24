<link rel="stylesheet" href="css/style.css">
<?php
include('includes/init.php');
include('includes/db.php');
include('includes/header.php');
include('includes/checkout_handler.php');
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
    $pid = $_POST['product_id'];
    $qty = $_POST['quantity'];
    $_SESSION['cart'][$pid] = $qty;
}

$cart_items = $_SESSION['cart'];
$total = 0;
?>


<div class="cart">
  <h2>Your Cart</h2>
  <?php if (empty($cart_items)): ?>
    <p>Your cart is empty.</p>
  <?php else: ?>
    <form method="POST" action="checkout.php">
    <input type="hidden" name="products[<?= $pid ?>]" value="<?= $qty ?>">
      <table>
        <tr><th>Product</th><th>Quantity</th><th>Price</th><th>Subtotal</th></tr>
        <?php foreach ($cart_items as $pid => $qty): 
          $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
          $stmt->execute([$pid]);
          $product = $stmt->fetch();
          if (!$product) continue;
          $subtotal = $product['price'] * $qty;
          $total += $subtotal;
        ?>
        <tr>
          <td><?= htmlspecialchars($product['name']); ?></td>
          <td><?= $qty; ?></td>
          <td>₦<?= number_format($product['price'], 2); ?></td>
          <td>₦<?= number_format($subtotal, 2); ?></td>
        </tr>
        <?php endforeach; ?>
        <tr><td colspan="3"><strong>Total:</strong></td><td><strong>₦<?= number_format($total, 2); ?></strong></td></tr>
      </table>
      <button type="submit">Proceed to Checkout</button>
    </form>
  <?php endif; ?>
</div>
<style>
  /* General page styling */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
}

.container {
  max-width: 1200px;
  margin: auto;
  padding: 20px;
}

h2 {
  font-size: 2rem;
  color: #333;
}

/* Cart Layout */
.cart {
  background-color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 20px;
  border-radius: 8px;
  margin-top: 20px;
}

.cart h2 {
  font-size: 2rem;
  font-weight: bold;
  color: #333;
  margin-bottom: 20px;
}

.cart p {
  font-size: 1rem;
  color: #666;
}

/* Table Styling */
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

th, td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #56ab2f;
  color: white;
  font-size: 1.1rem;
}

td {
  font-size: 1rem;
}

td strong {
  color: #56ab2f;
}

button {
  padding: 10px 16px;
  background-color: #56ab2f;
  color: white;
  font-size: 1rem;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  width: 100%;
  max-width: 200px;
  margin-top: 20px;
}

button:hover {
  background-color: #3c7c21;
}

/* Empty Cart Message */
.cart p {
  font-size: 1.2rem;
  text-align: center;
  color: #888;
}

/* Footer Styling */
footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

footer a {
  color: #56ab2f;
  text-decoration: none;
  transition: color 0.3s ease;
}

footer a:hover {
  color: #fff;
}


</style>
<?php include('includes/footer.php'); ?>
