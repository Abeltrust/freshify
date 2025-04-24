<link rel="stylesheet" href="css/style.css">

<?php
include('includes/init.php');
$to = $user_email;
$subject = "Order Confirmation";
$message = "Thank you for your order! We'll process it soon.";
$headers = "From: freshify@example.com";
mail($to, $subject, $message, $headers);
?>
<?php include('includes/footer.php'); ?>