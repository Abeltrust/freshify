<?php
include('includes/auth.php');
include('../includes/db.php');
include('includes/admin_header.php');

$products = $pdo->query("SELECT * FROM products ORDER BY created_at DESC")->fetchAll();
?>

<h3>All Products</h3>
<table>
  <tr><th>Name</th><th>Price</th><th>Action</th></tr>
  <?php foreach ($products as $p): ?>
    <tr>
      <td><?= htmlspecialchars($p['name']) ?></td>
      <td>₦<?= number_format($p['price'], 2); ?></td>
      <td>
        <button class="btn" onclick="openEditModal(<?= $p['id'] ?>, '<?= htmlspecialchars($p['name']) ?>', <?= $p['price'] ?>)">Edit</button>
        <button class="btn btn-danger btn-delete" onclick="PdeleteModal" data-id="<?= $p['id'] ?>">Delete</button>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<!-- Edit Product Modal -->
<div id="productEditModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeProductEdit">&times;</span>
    <h3>Edit Product</h3>
    <form action="update_product.php" method="POST" class="modal-form">
      <input type="hidden" name="id" id="edit-product-id">

      <div class="form-group">
        <label for="edit-product-name">Name</label>
        <input type="text" name="name" id="edit-product-name" required>
      </div>

      <div class="form-group">
        <label for="edit-product-price">Price</label>
        <input type="number" name="price" id="edit-product-price" step="0.01" required>
      </div>

      <button type="submit" class="btn">Update Product</button>
    </form>
  </div>
</div>
<!-- Delete Confirmation Modal -->
<div id="PdeleteModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeDelete">&times;</span>
    <h3>Delete User</h3>
    <p>Are you sure you want to delete this user?</p>
    <form action="delete_user.php" method="POST">
      <input type="hidden" name="id" id="delete-id">
      <button type="submit" class="btn btn-danger">Yes, Delete</button>
    </form>
  </div>
</div>
<style>
    /* Modal Wrapper */
.modal {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  overflow: auto;
}

/* Modal Box */
.modal-content {
  background: #fff;
  margin: 8% auto;
  padding: 30px;
  border-radius: 12px;
  width: 95%;
  max-width: 450px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.3);
  position: relative;
  font-family: 'Segoe UI', sans-serif;
}

/* Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 24px;
  color: #999;
  cursor: pointer;
}

.close:hover {
  color: #ff5c5c;
}

/* Modal Heading */
.modal-content h3 {
  margin-bottom: 20px;
  font-size: 22px;
  color: #333;
  text-align: center;
}

/* Form Styling */
.modal-form .form-group {
  margin-bottom: 15px;
}

.modal-form label {
  display: block;
  margin-bottom: 5px;
  font-weight: 600;
  color: #555;
}

.modal-form input,
.modal-form select {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
}

.modal-form input:focus,
.modal-form select:focus {
  outline: none;
  border-color: #28a745;
  box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
}

/* Submit Button */
.modal-form .btn {
  width: 100%;
  padding: 12px;
  background-color: #28a745;
  border: none;
  color: white;
  font-weight: bold;
  border-radius: 6px;
  cursor: pointer;
  margin-top: 10px;
  transition: background 0.3s;
}

.modal-form .btn:hover {
  background-color: #218838;
}
.btn {
  padding: 8px 14px;
  background-color: #28a745;
  color: white;
  border: none;
  margin-top: 10px;
  cursor: pointer;
  border-radius: 5px;
}

.btn-danger {
  background-color: #dc3545;
}
</style>
<script>
  const productModal = document.getElementById('productEditModal');
  const closeProductEdit = document.getElementById('closeProductEdit');

  function openEditModal(id, name, price) {
    document.getElementById('edit-product-id').value = id;
    document.getElementById('edit-product-name').value = name;
    document.getElementById('edit-product-price').value = price;
    productModal.style.display = 'block';
  }
   // Delete Modal
   document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', () => {
      document.getElementById('delete-id').value = button.dataset.id;
      document.getElementById('deleteModal').style.display = 'block';
    });
  });

  // Close modals
  document.getElementById('PdeleteModal').onclick = () => {
    document.getElementById('PdeleteModal').style.display = 'none';
  };
  closeProductEdit.onclick = () => productModal.style.display = 'none';
  window.onclick = (e) => { if (e.target === productModal) productModal.style.display = 'none'; }
</script>

<style>
    /* General body styles */
body {
  font-family: 'Arial', sans-serif;
  background-color: #f4f7fc;
  color: #333;
  margin: 0;
  padding: 0;
}

/* Container for the table and content */
.container {
  max-width: 1200px;
  margin: 30px auto;
  padding: 0 20px;
}

/* Header styling */
h3 {
  font-size: 28px;
  font-weight: bold;
  color: #2d3e50;
  margin-bottom: 20px;
  text-align: center;
}

/* Table styles */
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

table th, table td {
  padding: 15px;
  text-align: left;
  border: 1px solid #ddd;
}

table th {
  background-color: #007bff;
  color: #fff;
}

table tr:nth-child(even) {
  background-color: #f9f9f9;
}

table tr:hover {
  background-color: #f1f1f1;
}

/* Action buttons */
a {
  text-decoration: none;
  color: #007bff;
  font-weight: bold;
  padding: 5px 10px;
  border-radius: 4px;
  transition: background-color 0.3s ease, color 0.3s ease;
}

a:hover {
  background-color: #007bff;
  color: #fff;
}

/* Container for the table */
.table-container {
  margin-top: 30px;
}

/* Add some space between the table and the footer */
footer {
  margin-top: 30px;
  text-align: center;
  padding: 15px;
  background-color: #333;
  color: #fff;
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
  table {
    font-size: 14px;
  }

  table th, table td {
    padding: 10px;
  }

  h3 {
    font-size: 24px;
  }
}

</style>
<?php include('includes/admin_footer.php'); ?>
