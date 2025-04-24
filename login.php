
<?php include('includes/login_handler.php'); ?>
<link rel="stylesheet" href="css/style.css">
<?php include('includes/db.php');
include('includes/init.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role']
        ];

        // Redirect based on role
        if ($user['role'] === 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: dashboard.php");
        }
        exit;
    } else {
        echo "Invalid login credentials!";
    }
}
?>
    <!-- <div class="row">
      <div class="col-md-12 logo-container">
         <img src="images/logo.png" alt="Freshify Logo" class="form-logo">
      </div>
    </div> -->
   <div class="row">
   <div class="col-md-12 auth-container">
        <form action="includes/login_handler.php" method="POST" class="auth-form">
            <h2>Login to Freshify</h2>

            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit" class="btn">Login</button>
            <p class="switch-link">Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>

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
  .auth-form h2 {
    text-align: center;
    color: #56ab2f;
    margin-bottom: 20px;
  }
  .auth-container {
    background: rgba(243, 248, 248, 0.55); white with 85% opacity
    border-radius: 10px;
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
    width: 100%;
    height:100%;
    /* max-width: 400px; */
    margin: 0 auto;
    justify-content: center !important;
    opacity: 1px;
  }

  .logo-container {
  margin-bottom: 0px;
}

.form-logo {
  max-width: 100px;
  height: auto;
  display: block;
  margin: 0 auto;
}

  .auth-form {
    display: flex;
    flex-direction: column;
    width: 380px;
  }

  .auth-form h2 {
    margin-bottom: 20px;
    color: #333;
  }

  .auth-form label {
    margin-bottom: 5px;
    text-align: left;
    color: #555;
  }

  .auth-form input {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
  }

  .auth-form .btn {
    padding: 10px;
    background-color: #28a745;
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
  }

  .auth-form .btn:hover {
    background-color: #218838;
  }

  .switch-link {
    margin-top: 10px;
    font-size: 14px;
    text-align: center;
  }

  .switch-link a {
    color: #007bff;
    text-decoration: none;
  }

  .switch-link a:hover {
    text-decoration: underline;
  }
  .logo-container {
  text-align: center;
  margin-bottom: 0px;
}

.form-logo {
  max-width: 120px;
  height: auto;
  filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
}

</style>


