<?php include('includes/auth.php'); ?>
<?php include('includes/admin_header.php'); ?>
<div class="dashboard">
  <h3>Welcome Admin, <?= htmlspecialchars($_SESSION['user_name']); ?>!</h3>
  <div class="admin-grid">
    <a href="manage_users.php" class="admin-card">
      <div class="card-content">
        <h4>Manage Users</h4>
        <p>View, edit, and manage users in the system.</p>
      </div>
    </a>
    <a href="manage_products.php" class="admin-card">
      <div class="card-content">
        <h4>Manage Products</h4>
        <p>View, edit, and manage products in the system.</p>
      </div>
    </a>
    <!-- New Section: Manage Reviews -->
    <a href="manage_reviews.php" class="admin-card">
      <div class="card-content">
        <h4>Manage Reviews</h4>
        <p>View and manage customer reviews for products.</p>
      </div>
    </a>
    <!-- New Section: Manage Contact Us Messages -->
    <a href="manage_contact_us.php" class="admin-card">
      <div class="card-content">
        <h4>Manage Contact Us Messages</h4>
        <p>View and respond to customer inquiries and messages.</p>
      </div>
    </a>
  </div>
</div>


   <style>
    /* General reset and body layout */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f7fc;
  color: #333;
  margin: 0;
  padding: 0;
}

.dashboard {
  display: flex;
  flex-direction: column;
  justify-content: center; /* Vertically center content */
  align-items: center;     /* Horizontally center content */
  min-height: 100vh;       /* Make sure the content takes at least the full height of the viewport */
  text-align: center;      /* Center the text in the dashboard */
  background-color: #f4f7fc;
  padding: 20px;
}

.dashboard h3 {
  font-size: 24px;
  color: #333;
  margin-bottom: 20px;
}

.admin-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Responsive grid layout */
  gap: 20px; /* Space between cards */
  max-width: 1000px; /* Limit the width */
  width: 100%;
  padding: 20px;
  box-sizing: border-box;
}

.admin-card {
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  text-decoration: none;
  overflow: hidden;
  transition: transform 0.3s ease;
}

.admin-card:hover {
  transform: translateY(-10px); /* Slight hover effect */
}

.admin-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
}

.card-content h4 {
  font-size: 22px;
  color: #2d3e50;
  margin-bottom: 10px;
  justify-content:center;
}

.card-content p {
  font-size: 16px;
  color: #666;
  margin-bottom: 15px;
}

/* Add some padding and rounded corners */
.admin-card .card-content {
  padding: 15px;
  border-radius: 8px;
}

/* Hover effect for card contents */
.admin-card:hover .card-content {
  background-color: #f0f7ff;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .dashboard {
    margin: 10px;
  }

  .admin-grid {
    grid-template-columns: 1fr;
  }
}

   </style>
<?php include('includes/admin_footer.php'); ?>
