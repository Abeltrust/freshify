<?php include('includes/header.php'); ?>
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
<div class="auth-container">
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

<?php include('includes/footer.php'); ?>
