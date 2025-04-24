<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Freshify Marketplace</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv7M66kH2u70A1R9Toz9HUc+fI6im3YYj0ZKr/Miq2VVw6s6kIvlYft7W11" crossorigin="anonymous">
</head>
<body>
  <header class="site-header">
    <div class="container">
      <a href="index.php" class="logo-link">
        <img src="images/logo.png" alt="Freshify Logo" class="header-logo">
        <span class="site-title">Freshify</span>
      </a>
     
        <nav class="main-nav">
          <a href="dashboard.php">Home</a>
          <a href="products.php">Marketplace</a>
          <a href="contact.php">Contact</a>
          <a href="about.php">About</a>
          <a href="profile.php">Profile</a>
          <?php if (!isset($_SESSION['user'])): ?>
            <a href="includes/logout.php">Logout</a>
          <?php else: ?>
            <a href="login.php">Login (<?php echo htmlspecialchars($_SESSION['user']['name']); ?>)</a>
          <?php endif; ?>
        </nav>

    </div>
  </header>
<style>
    .site-header {
  background-color: #56ab2f;
  padding: 10px 20px;
  color: white;
}
.container {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.logo-link {
  display: flex;
  align-items: center;
  text-decoration: none;
  color: white;
}
.header-logo {
  width: 40px;
  margin-right: 10px;
}
.site-title {
  font-size: 1.5rem;
  font-weight: bold;
}
.main-nav a {
  margin-left: 20px;
  text-decoration: none;
  color: white;
  font-weight: 500;
}
.main-nav a:hover {
  text-decoration: underline;
}

</style>