<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include('includes/db.php');
include('includes/header.php');
include('includes/init.php');

$user_name = $_SESSION['user_name'];
$user_role = $_SESSION['user_role'];

// Fetch latest products
// $sql = "SELECT id, name, price, image FROM products ORDER BY created_at DESC LIMIT 5";
// $stmt = $pdo->prepare($sql);
// $latestProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 
// Fetch latest products using PDO
$stmt = $pdo->prepare("SELECT id, name, price, image FROM products ORDER BY created_at DESC LIMIT 4");
$stmt->execute();
$latestProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="dashboard-wrapper">
  <div class="welcome-card">
    <h2>Hello, <?= htmlspecialchars($user_name); ?> </h2>
    <p>You are logged in as <strong><?= ucfirst($user_role); ?></strong></p>
  </div>

  <div class="dashboard-actions">
    <?php if ($user_role === 'vendor'): ?>
      <div class="action-card">
        <h3>Add New Product</h3>
        <a href="add_product.php" class="action-btn">Add Product</a>
      </div>
      <div class="action-card">
        <h3> View Your Products</h3>
        <a href="products.php" class="action-btn">View Products</a>
      </div>
    <?php elseif($user_role === 'buyer'): ?>
      <div class="action-card">
        <h3> Browse Products</h3>
        <a href="products.php" class="action-btn">Shop Now</a>
      </div>
      <div class="action-card">
        <h3> View Cart</h3>
        <a href="cart.php" class="action-btn">Go to Cart</a>
      </div>
    <?php else: ?>
      <div class="action-card">
        <h3> Browse All Products</h3>
        <a href="products.php" class="action-btn">View All</a>
      </div>
      <div class="action-card">
        <h3> Add Product</h3>
        <a href="add_product.php" class="action-btn">Add New</a>
      </div>
      <div class="action-card">
        <h3>View Cart</h3>
        <a href="cart.php" class="action-btn">Go to Cart</a>
      </div>
    <?php endif; ?>
  </div>
</div>


<div class="importance-section dashboard-wrapper magic fade-in">
  <h3>Why Fruits Matter </h3>
  <p>Fruits are nature’s candy — rich in vitamins, fiber, and antioxidants. They help reduce risk of chronic diseases, boost immunity, and keep your skin glowing. Start your day with a fruit and feel the magic unfold!</p>
</div>

<div class="carousel-section  dashboard-wrapper fade-in">
  <h3>Latest Products</h3>
  <div class="carousel">
    <?php foreach ($latestProducts as $product): ?>
      <div class="product-card">
        <img src="uploads/product_images/<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
        <h4><?= htmlspecialchars($product['name']); ?></h4>
        <p>₦<?= number_format($product['price'], 2); ?></p>
        <a href="product_details.php?id=<?= $product['id']; ?>" class="view-btn">View</a>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="see-more-wrapper">
  <a href="products.php" class="see-more-btn">See More Products →</a>
</div>


<div class="review-section dashboard-wrapper fade-in">
  <h3>Have Feedback?</h3>
  <p>We'd love to hear from you. Let us know what you think about our platform or products.</p>
  <a href="review.php" class="review-btn">Write a Review</a>
</div>

<style>
  .magic { margin-top: 40px; padding: 20px; background: #eafaea; border-left: 5px solid #4caf50; border-radius: 10px; }
  .magic h3 { margin-top: 0; }

  .carousel-section { margin: 50px 0; text-align: center; }
  .carousel {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    padding: 10px;
    scroll-snap-type: x mandatory;
    justify-content:center;
  }

  .product-card {
    flex: 0 0 200px;
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    scroll-snap-align: start;
    transition: transform 0.3s ease;
  }

  .product-card:hover {
    transform: scale(1.05);
  }

  .product-card img {
    width: 100%;
    height: 140px;
    object-fit: cover;
    border-radius: 10px;
  }

  .product-card h4 { margin: 10px 0 5px; }
  .product-card p { margin: 0; font-weight: bold; color: #4caf50; }

  .view-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 5px 10px;
    background: #4caf50;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 0.9rem;
  }

  .review-section {
    background: #f1f1f1;
    padding: 30px;
    text-align: center;
    margin-top: 40px;
    border-radius: 10px;
  }

  .review-btn {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background: #ff9800;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    transition: background 0.3s ease;
  }

  .review-btn:hover {
    background: #e68a00;
  }

  .fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeIn 1s forwards;
  }

  @keyframes fadeIn {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .dashboard-wrapper {
  max-width: 1000px;
  margin: 40px auto;
  padding: 20px;
}

.welcome-card {
  background: linear-gradient(135deg, #56ab2f, #a8e063);
  color: white;
  padding: 30px 20px;
  border-radius: 12px;
  text-align: center;
  margin-bottom: 30px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

.dashboard-actions {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 20px;
}

.action-card {
  background-color: #fff;
  border-radius: 12px;
  padding: 20px;
  text-align: center;
  box-shadow: 0 8px 16px rgba(0,0,0,0.05);
  transition: transform 0.3s ease;
}

.action-card:hover {
  transform: translateY(-5px);
}

.action-card h3 {
  font-size: 1.2rem;
  color: #333;
  margin-bottom: 15px;
}

.action-btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #56ab2f;
  color: white;
  text-decoration: none;
  font-weight: bold;
  border-radius: 8px;
  transition: background 0.3s ease;
}

.action-btn:hover {
  background-color: #3c7c21;
}
.see-more-wrapper {
  text-align: center;
  margin-top: 20px;
}

.see-more-btn {
  display: inline-block;
  padding: 10px 25px;
  background-color: #56ab2f;
  color: #fff;
  font-weight: bold;
  border-radius: 8px;
  text-decoration: none;
  transition: background 0.3s ease, transform 0.2s ease;
}

.see-more-btn:hover {
  background-color: #3c7c21;
  transform: translateY(-2px);
}


</style>

<?php include('includes/footer.php'); ?>

