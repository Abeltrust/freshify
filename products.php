<?php
include('includes/db.php');
include('includes/header.php');
include('includes/init.php');
$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';
$sql = "SELECT * FROM products WHERE name LIKE ? AND category LIKE ?";
$stmt = $pdo->prepare($sql);
$searchTerm = "%$search%";
$categoryTerm = "%$category%";
$stmt->execute([$searchTerm, $categoryTerm]);
$products = $stmt->fetchAll();
?>

<link rel="stylesheet" href="css/style.css">

<div class="row">
  <div class="col-md-6 m" >
    <form id="searchForm" method="GET" action="products.php" class="search-bar styled-form">
      <input 
        type="text" 
        id="searchInput" 
        name="search" 
        placeholder="Search for products..." 
        value="<?= htmlspecialchars($search); ?>" 
        class="form-input"
      >
      <select name="category" class="form-select">
        <option value="">All</option>
        <option value="fruits" <?= $category == 'fruits' ? 'selected' : '' ?>>Fruits</option>
        <option value="vegetables" <?= $category == 'vegetables' ? 'selected' : '' ?>>Vegetables</option>
      </select>
      <button type="submit" class="btn">Search</button>
    </form>
  </div>
</div>


<div class="row">
  <div class="products-header col-md-12">
    <h3 class="section-title">Fresh Products Just for You</h3>
      <a href="add_product.php" class="btn-add-product">+ Add Product</a>
    
  </div>
</div>
<div class="row">
  <div class="col-md-3">
  <div class="product-grid " id="productGrid">
    <?php foreach ($products as $product): ?>
      <div class="product-card fade-in" data-name="<?= strtolower($product['name']); ?>">
        <img src="uploads/product_images/<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
        <h3><?= htmlspecialchars($product['name']); ?></h3>
        <p>₦<?= number_format($product['price'], 2); ?></p>
        <a href="product_details.php?id=<?= $product['id']; ?>" class="btn">View</a>
      </div>
    <?php endforeach; ?>
  </div>
  </div>
</div>

</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
  let searchVal = this.value.toLowerCase();
  let cards = document.querySelectorAll('.product-card');

  cards.forEach(card => {
    let name = card.getAttribute('data-name');
    card.style.display = name.includes(searchVal) ? 'block' : 'none';
  });
});
</script>

<style>
/* .container {
  max-width: 1200px;
  margin: auto;
  padding: 20px;
} */
 .m{
  margin-top: 20px;
 }
.search-bar {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}
.product-grid {
  display: flex;
  flex-wrap: wrap;
  margin-left: 20px;
  gap: 20px;
   /* Or 'center' for centered items */
}
.product-card {
  background: white;
  border: 1px solid #eaeaea;
  border-radius: 10px;
  padding: 15px;
  text-align: center;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
.product-card img {
  max-width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 8px;
}
.product-card h3 {
  margin: 10px 0 5px;
}
.product-card p {
  font-weight: bold;
  color: #2e7d32;
}
.product-card .btn {
  margin-top: 10px;
  display: inline-block;
  padding: 8px 12px;
  background: #56ab2f;
  color: white;
  text-decoration: none;
  border-radius: 5px;
}

.styled-form {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 10px;
  align-items: center;
  justify-content: center;
}

.form-input, .form-select {
  padding: 10px;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 5px;
  min-width: 200px;
}

.btn {
  background-color: #56ab2f;
  color: white;
  border: none;
  padding: 10px 16px;
  border-radius: 5px;
  cursor: pointer;
}

.btn-outline {
  background: none;
  color: #56ab2f;
  border: 2px solid #56ab2f;
  padding: 10px 16px;
  border-radius: 5px;
  cursor: pointer;
}

.btn:hover, .btn-outline:hover {
  opacity: 0.9;
}

.products-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 30px auto 20px;
  padding: 0 20px;
}

.section-title {
  font-size: 2rem;
  font-weight: bold;
  color: #333;
  position: relative;
  animation: slideIn 0.6s ease-out forwards;
}

.btn-add-product {
  padding: 10px 16px;
  background: #56ab2f;
  color: white;
  width:auto;
  text-decoration: none;
  border-radius: 6px;
  font-weight: bold;
  transition: background 0.3s ease;
}

.btn-add-product:hover {
  background: #3c7c21;
}


.product-card {
  background: white;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  overflow: hidden;
  padding: 16px;
  text-align: center;
  transition: transform 0.3s;
}

.product-card img {
  max-width: 100%;
  height: 150px;
  object-fit: cover;
  margin-bottom: 10px;
  border-radius: 8px;
}

.product-card:hover {
  transform: translateY(-5px);
}

.fade-in {
  opacity: 0;
  animation: fadeIn 1s forwards;
}

/* Animations */
@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

@keyframes slideIn {
  from {
    transform: translateY(-10px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

</style>

<?php include('includes/footer.php'); ?>
