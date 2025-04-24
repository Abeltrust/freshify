
<?php include('includes/register_handler.php'); 
include('includes/init.php');?>
<link rel="stylesheet" href="css/style.css">

<div class="auth-container">
  <form action="includes/register_handler.php" method="POST" class="auth-form">
    <h2>Create Account</h2>

    <label for="name">Full Name</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <label for="role">Register As</label>
    <select name="user_type">
        <option value="customer">Customer</option>
        <option value="vendor">Vendor</option>
    </select>

    <button type="submit" class="btn">Register</button>
    <p class="switch-link">Already have an account? <a href="login.php">Login here</a></p>
  </form>
</div>
<style>
   body {
    height: 100vh;
    background: url('images/logo.png') no-repeat center center fixed;
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
