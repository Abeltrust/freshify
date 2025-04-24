<?php
include('includes/auth.php');
include('../includes/db.php');
include('includes/admin_header.php');

// Fetch all contact us messages from the database
$messages = $pdo->query("SELECT * FROM contact_us ORDER BY created_at DESC")->fetchAll();
?>

<h3>Contact Us Messages</h3>
<table>
  <tr><th>Name</th><th>Email</th><th>Message</th><th>Action</th></tr>
  <?php foreach ($messages as $message): ?>
    <tr>
      <td><?= htmlspecialchars($message['name']) ?></td>
      <td><?= htmlspecialchars($message['email']) ?></td>
      <td><?= htmlspecialchars($message['message']) ?></td>
      <td>
        <a href="delete_message.php?id=<?= $message['id'] ?>" onclick="return confirm('Delete this message?')">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<style>
    /* General body styles */
body {
  font-family: 'Arial', sans-serif;
  background-color: #f4f7fc;
  color: #333;
  margin: 0;
  padding: 0;
}

/* Container for the table and content */
.container {
  max-width: 1200px;
  margin: 30px auto;
  padding: 0 20px;
}

/* Header styling */
h3 {
  font-size: 28px;
  font-weight: bold;
  color: #2d3e50;
  margin-bottom: 20px;
  text-align: center;
}

/* Table styles */
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

table th, table td {
  padding: 15px;
  text-align: left;
  border: 1px solid #ddd;
}

table th {
  background-color: #007bff;
  color: #fff;
}

table tr:nth-child(even) {
  background-color: #f9f9f9;
}

table tr:hover {
  background-color: #f1f1f1;
}

/* Action buttons */
a {
  text-decoration: none;
  color: #007bff;
  font-weight: bold;
  padding: 5px 10px;
  border-radius: 4px;
  transition: background-color 0.3s ease, color 0.3s ease;
}

a:hover {
  background-color: #007bff;
  color: #fff;
}

/* Container for the table */
.table-container {
  margin-top: 30px;
}

/* Add some space between the table and the footer */
footer {
  margin-top: 30px;
  text-align: center;
  padding: 15px;
  background-color: #333;
  color: #fff;
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
  table {
    font-size: 14px;
  }

  table th, table td {
    padding: 10px;
  }

  h3 {
    font-size: 24px;
  }
}

</style>
<?php include('includes/admin_footer.php'); ?>
