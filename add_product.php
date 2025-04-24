<?php include('includes/header.php'); ?>
<?php include('includes/db.php');
include('includes/init.php'); ?>


<div class="add-product-container">
  <h2>Add New Product</h2>
  <form action="process_add_product.php" method="POST" enctype="multipart/form-data" class="add-product-form">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="number" name="price" placeholder="Price (₦)" step="0.01" required>
    
    <select name="category" required>
      <option value="">Select Category</option>
      <option value="fruits">Fruits</option>
      <option value="vegetables">Vegetables</option>
    </select>
    
    <textarea name="description" placeholder="Product Description" rows="4" required></textarea>
    
    <label for="image">Upload Image</label>
    <input type="file" name="image" accept="image/*" required>
    
    <button type="submit">Add Product</button>
  </form>
</div>
<style>
  .add-product-container {
  max-width: 600px;
  margin: 50px auto;
  background: white;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
  animation: slideIn 0.8s ease;
}

.add-product-container h2 {
  text-align: center;
  margin-bottom: 25px;
  color: #56ab2f;
}

.add-product-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.add-product-form input,
.add-product-form select,
.add-product-form textarea,
.add-product-form button {
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 1rem;
}

.add-product-form input:focus,
.add-product-form select:focus,
.add-product-form textarea:focus {
  border-color: #56ab2f;
  outline: none;
  box-shadow: 0 0 0 3px rgba(86, 171, 47, 0.2);
}

.add-product-form button {
  background: #56ab2f;
  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s ease;
}

.add-product-form button:hover {
  background: #4a962a;
}

@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>
<style>
   body {
    height: 100vh;
    background: url('images/image1.png') no-repeat center center fixed;
    background-size: cover;
    justify-content: center !important;
    align-items: center !important;
    font-family: 'Segoe UI', sans-serif;
  }
  .auth-container {
    background: rgba(243, 248, 248, 0.32); /* white with 85% opacity */
    border-radius: 10px;
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
    width: 100%;
    height:100%;
    /* max-width: 400px; */
    margin: 0 auto;
    justify-content: center !important;
  }
  .auth-form {
    display: flex;
    flex-direction: column;
    width: 380px;
  }
</style>
<?php include('includes/footer.php'); ?>
