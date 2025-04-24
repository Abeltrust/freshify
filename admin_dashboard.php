<link rel="stylesheet" href="css/style.css">

<?php
include 'includes/db.php';
include('includes/init.php');
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
<h2>Admin Dashboard</h2>
<table>
<tr><th>ID</th><th>Email</th><th>Role</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['user_type']; ?></td>
</tr>
<?php endwhile; ?>
</table>
<?php include('includes/footer.php'); ?>