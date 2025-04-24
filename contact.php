<?php
include('includes/init.php');
include('includes/header.php');

// Handle form submission
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if ($name && $email && $subject && $message) {
        // Here you can send email or store into DB
        $success = "Thank you, $name! Your message has been sent.";
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<div class="contact-container">
    <h2>Contact Us</h2>
    
    <?php if ($success): ?>
        <p class="success"><?= htmlspecialchars($success); ?></p>
    <?php elseif ($error): ?>
        <p class="error"><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="POST" action="contact.php" class="contact-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</div>

<style>
    .contact-container {
        max-width: 600px;
        margin: 50px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .contact-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .contact-form label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
        color: #444;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
    }

    .contact-form button {
        margin-top: 20px;
        padding: 12px 20px;
        background: #56ab2f;
        border: none;
        color: white;
        font-size: 1rem;
        border-radius: 6px;
        cursor: pointer;
        width: 100%;
    }

    .contact-form button:hover {
        background: #3c7c21;
    }

    .success {
        color: green;
        text-align: center;
        font-weight: bold;
    }

    .error {
        color: red;
        text-align: center;
        font-weight: bold;
    }
</style>

<?php include('includes/footer.php'); ?>
