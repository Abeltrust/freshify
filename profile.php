<?php
session_start();
include('includes/db.php');
include('includes/init.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    echo "User not found.";
    exit;
}

// Update profile
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Profile pic upload
    if (!empty($_FILES['profile_pic']['name'])) {
        $imgName = uniqid() . "_" . basename($_FILES["profile_pic"]["name"]);
        $targetDir = "uploads/profiles/";
        $targetFile = $targetDir . $imgName;

        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFile)) {
            $stmt = $pdo->prepare("UPDATE users SET name=?, email=?, profile_pic=? WHERE id=?");
            $stmt->execute([$name, $email, $imgName, $user_id]);
            $user['profile_pic'] = $imgName;
        }
    } else {
        $stmt = $pdo->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->execute([$name, $email, $user_id]);
    }

    $user['name'] = $name;
    $user['email'] = $email;
}
?>

<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="css/style.css">

<div class="profile-page">
    <div class="card fade-in">
        <div class="avatar">
            <img src="images/team2.jpg" alt="Profile Picture">
        </div>
        <h2><?= htmlspecialchars($user['name']) ?></h2>
        <p>Email: <?= htmlspecialchars($user['email']) ?></p>

        <button class="btn" onclick="document.getElementById('editModal').style.display='block'">Edit Profile</button>
    </div>
</div>

<!-- Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span onclick="document.getElementById('editModal').style.display='none'" class="close">&times;</span>
        <h3>Edit Your Profile</h3>
        <form method="POST" enctype="multipart/form-data">
            <label>Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            <label>Profile Picture:</label>
            <input type="file" name="profile_pic" accept="image/*" disabled>
            <button type="submit" name="update_profile" class="btn">Save Changes</button>
        </form>
    </div>
</div>
<style>
    .profile-page {
  display: flex;
  justify-content: center;
  padding: 50px 20px;
}

.card {
  background: #fff;
  padding: 30px;
  border-radius: 16px;
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
  text-align: center;
  max-width: 500px;
  width: 100%;
  animation: fadeInUp 0.6s ease;
}

.avatar img {
  width: 140px;
  height: 140px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 20px;
  border: 4px solid #28a745;
}

.btn {
  background: #28a745;
  color: white;
  padding: 10px 25px;
  border: none;
  border-radius: 30px;
  cursor: pointer;
  margin-top: 15px;
}

.btn:hover {
  background: #218838;
}

/* Modal */
.modal {
  display: none;
  position: fixed;
  z-index: 999;
  left: 0; top: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.5);
}

.modal-content {
  background: #fff;
  margin: 10% auto;
  padding: 20px;
  border-radius: 12px;
  width: 90%;
  max-width: 500px;
  position: relative;
}

.modal-content input[type="text"],
.modal-content input[type="email"],
.modal-content input[type="file"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

.close {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 28px;
  cursor: pointer;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>
<?php include('includes/footer.php'); ?>
