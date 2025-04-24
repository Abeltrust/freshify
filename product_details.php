<link rel="stylesheet" href="css/style.css">
<?php
include('includes/db.php');
include('includes/header.php');
include('includes/init.php');
if (!isset($_GET['id'])) {
    echo "<p>Product not found.</p>";
    include('includes/footer.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$_GET['id']]);
$product = $stmt->fetch();

if (!$product) {
    echo "<p>Product not found.</p>";
    include('includes/footer.php');
    exit;
}
?>

<div class="product-detail">
  <img src="uploads/product_images/<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
  <div>
    <h2><?= htmlspecialchars($product['name']); ?></h2>
    <p><?= htmlspecialchars($product['description']); ?></p>
    <p><strong>₦<?= number_format($product['price'], 2); ?></strong></p>
    <form method="POST" action="cart.php">
      <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
      <input type="number" name="quantity" value="1" min="1">
      <button type="submit">Add to Cart</button>
    </form>
  </div>
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

p {
  color: #666;
}

/* Product Detail Styling */
.product-detail {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  gap: 30px;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  margin-top: 20px;
}

.product-detail img {
  max-width: 400px;
  height: auto;
  object-fit: cover;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.product-detail div {
  flex: 1;
}

.product-detail h2 {
  margin-bottom: 15px;
  font-size: 2rem;
  color: #333;
}

.product-detail p {
  line-height: 1.6;
  font-size: 1rem;
}

.product-detail p strong {
  font-size: 1.2rem;
  color: #56ab2f;
}

.product-detail form {
  margin-top: 20px;
  display: flex;
  gap: 10px;
  align-items: center;
}

.product-detail input[type="number"] {
  padding: 8px 12px;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 60px;
}

.product-detail button {
  padding: 10px 16px;
  background-color: #56ab2f;
  color: white;
  font-size: 1rem;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.product-detail button:hover {
  background-color: #3c7c21;
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
