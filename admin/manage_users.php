<?php
include('includes/auth.php');
include('../includes/db.php');
include('includes/admin_header.php');

$users = $pdo->query("SELECT * FROM users")->fetchAll();
?>

<h3>All Users</h3>
<table>
  <tr><th>Name</th><th>Email</th><th>Role</th><th>Action</th></tr>
  <?php foreach ($users as $user): ?>
    <tr>
      <td><?= htmlspecialchars($user['name']) ?></td>
      <td><?= htmlspecialchars($user['email']) ?></td>
      <td><?= htmlspecialchars($user['role']) ?></td>
      <td>
        <button class="btn btn-edit"
                data-id="<?= $user['id'] ?>"
                data-name="<?= htmlspecialchars($user['name']) ?>"
                data-email="<?= htmlspecialchars($user['email']) ?>"
                data-role="<?= $user['role'] ?>">Edit</button>
        <button class="btn btn-danger btn-delete"
                data-id="<?= $user['id'] ?>">Delete</button>
        </td>
    </tr>
  <?php endforeach; ?>
</table>

<!-- Edit User Modal -->
<div id="editModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeEdit">&times;</span>
    <h3>Edit User</h3>
    <form action="update_user.php" method="POST" class="modal-form">
      <input type="hidden" name="id" id="edit-id">

      <div class="form-group">
        <label for="edit-name">Name</label>
        <input type="text" name="name" id="edit-name" required>
      </div>

      <div class="form-group">
        <label for="edit-email">Email</label>
        <input type="email" name="email" id="edit-email" required>
      </div>

      <div class="form-group">
        <label for="edit-role">Role</label>
        <select name="role" id="edit-role">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit" class="btn">Update</button>
    </form>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal">
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
  // Edit Modal
  document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', () => {
      document.getElementById('edit-id').value = button.dataset.id;
      document.getElementById('edit-name').value = button.dataset.name;
      document.getElementById('edit-email').value = button.dataset.email;
      document.getElementById('edit-role').value = button.dataset.role;
      document.getElementById('editModal').style.display = 'block';
    });
  });

  // Delete Modal
  document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', () => {
      document.getElementById('delete-id').value = button.dataset.id;
      document.getElementById('deleteModal').style.display = 'block';
    });
  });

  // Close modals
  document.getElementById('closeEdit').onclick = () => {
    document.getElementById('editModal').style.display = 'none';
  };
  document.getElementById('closeDelete').onclick = () => {
    document.getElementById('deleteModal').style.display = 'none';
  };

  // Close modal if clicked outside
  window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
      event.target.style.display = "none";
    }
  };
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

/* Container for the content */
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

/* Table styling */
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
  text-transform: uppercase;
}

table tr:nth-child(even) {
  background-color: #f9f9f9;
}

table tr:hover {
  background-color: #f1f1f1;
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

/* Footer styling */
footer {
  margin-top: 30px;
  text-align: center;
  padding: 15px;
  background-color: #333;
  color: #fff;
}

</style>
<?php include('includes/admin_footer.php'); ?>
