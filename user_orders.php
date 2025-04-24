<link rel="stylesheet" href="css/style.css">
<?php
include 'includes/db.php';
include('includes/init.php');
session_start();
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<h2>My Orders</h2>
<ul>
<?php while ($order = $result->fetch_assoc()): ?>
  <li>Product: <?php echo $order['product_id']; ?> - Qty: <?php echo $order['quantity']; ?> - Total: ₦<?php echo $order['total']; ?></li>
<?php endwhile; ?>
</ul>
<?php include('includes/footer.php'); ?>