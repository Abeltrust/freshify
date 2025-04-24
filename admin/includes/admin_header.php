<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - Freshify</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header class="admin-header">
    <h2>Admin Panel</h2>
    <nav>
      <a href="index.php">Dashboard</a>
      <a href="manage_users.php">Users</a>
      <a href="manage_products.php">Products</a>
      <a href="manage_reviews.php">Reviews</a>
      <a href="manage_contact_us.php">Message</a>
      <a href="../includes/logout.php">Logout</a>
    </nav>
  </header>
<style>
    /* General body styles */
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f7fc;
}

/* Admin header styling */
.admin-header {
  background-color: #007bff;
  color: white;
  padding: 20px;
  text-align: center;
}

.admin-header h2 {
  margin: 0;
  font-size: 30px;
  font-weight: 600;
}

.admin-header nav {
  margin-top: 15px;
}

.admin-header nav a {
  color: white;
  text-decoration: none;
  font-size: 18px;
  margin: 0 15px;
  padding: 10px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.admin-header nav a:hover {
  background-color: #0056b3;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Styling for the main content of the page */
.container {
  max-width: 1200px;
  margin: 30px auto;
  padding: 0 20px;
}

/* Footer styling */
footer {
  margin-top: 30px;
  text-align: center;
  padding: 15px;
  background-color: #333;
  color: white;
  font-size: 14px;
}

</style>