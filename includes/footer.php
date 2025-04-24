<footer class="site-footer">
  <div class="footer-content container">
    <div class="footer-logo">
      <img src="images/logo.png" alt="Freshify Logo">
      <p>Freshify Marketplace &copy; <?= date("Y"); ?>. All rights reserved.</p>
    </div>
    <div class="footer-links">
      <a href="contact.php">Contact</a>
      <a href="about.php">About</a>
    </div>
  </div>
</footer>
<style>
    .site-footer {
  background: #333;
  color: #eee;
  padding: 30px 0;
  margin-top: 50px;
  font-size: 0.95rem;
}

.footer-content {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  gap: 20px;
}

.footer-logo img {
  width: 60px;
  margin-bottom: 10px;
}

.footer-links a {
  margin-right: 15px;
  color: #ccc;
  text-decoration: none;
  transition: color 0.3s ease;
}

.footer-links a:hover {
  color: #a8e063;
}

</style>