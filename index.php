<link rel="stylesheet" href="css/style.css">
<?php include('includes/header.php');
include('includes/init.php'); ?>

<div class="hero m">
  <div class="hero-content">
    <img src="images/market.png" alt="Fresh Market" class="hero-img" />
    <div class="text-section">
      <h1>Welcome to <span class="highlight">Freshify</span></h1>
      <p>Your trusted marketplace for fresh, perishable goods delivered to your doorstep.</p>
      <div class="actions">
        <a href="register.php" class="btn">Join as Buyer or Seller</a>
        <a href="login.php" class="btn-outline">Already have an account?</a>
      </div>
    </div>
  </div>
</div>
<style>
  .hero {
  background: linear-gradient(to right, #f7fff7, #dfffd8);
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 70vh;
}

.hero-content {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 50px;
  flex-wrap: wrap;
  max-width: 1200px;
  width: 100%;
}

.hero-img {
  max-width: 500px;
  width: 100%;
  height: auto;
  border-radius: 20px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  transition: transform 0.4s ease;
}

.hero-img:hover {
  transform: scale(1.05);
}

.text-section {
  max-width: 600px;
}

.text-section h1 {
  font-size: 3rem;
  margin-bottom: 20px;
  color: #2c3e50;
}

.text-section p {
  font-size: 1.2rem;
  margin-bottom: 30px;
  color: #34495e;
}

.highlight {
  color: #28a745;
}

.actions a {
  margin-right: 15px;
  padding: 12px 24px;
  text-decoration: none;
  border-radius: 30px;
  font-weight: bold;
  transition: background 0.3s;
}

.btn {
  background-color: #28a745;
  color: #fff;
}

.btn:hover {
  background-color: #218838;
}

.btn-outline {
  border: 2px solid #28a745;
  color: #28a745;
  background-color: transparent;
}

.btn-outline:hover {
  background-color: #28a745;
  color: #fff;
}

</style>
