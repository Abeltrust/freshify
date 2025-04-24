<?php
include('includes/header.php');
?>

<div class="review-container">
  <h2 class="section-title">Write a Review</h2>
  <div class="review-card">
    <form method="POST" action="submit_review.php">
      <label for="name">Your Name</label>
      <input type="text" id="name" name="name" required>

      <label for="rating">Rating</label>
      <select id="rating" name="rating" required>
        <option value="">Select Rating</option>
        <option value="5">★★★★★</option>
        <option value="4">★★★★</option>
        <option value="3">★★★</option>
        <option value="2">★★</option>
        <option value="1">★</option>
      </select>

      <label for="message">Your Review</label>
      <textarea id="message" name="message" rows="5" required></textarea>

      <button type="submit">Submit Review</button>
    </form>
  </div>
</div>
<?php if (isset($_SESSION['success'])): ?>
  <div class="alert success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php elseif (isset($_SESSION['error'])): ?>
  <div class="alert error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>


<style>
  .review-container {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    animation: fadeInUp 1s ease-out;
  }

  .section-title {
    text-align: center;
    color: #56ab2f;
    font-size: 2rem;
    margin-bottom: 20px;
  }

  .review-card {
    background-color: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  }

  form label {
    display: block;
    margin: 15px 0 5px;
    font-weight: bold;
    color: #333;
  }

  form input, form select, form textarea {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 1rem;
    margin-bottom: 10px;
  }

  form button {
    background-color: #56ab2f;
    color: white;
    padding: 12px;
    font-size: 1rem;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
  }

  form button:hover {
    background-color: #3c7c21;
  }

  @keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
  }

  .alert {
  padding: 15px;
  border-radius: 6px;
  margin-bottom: 20px;
  text-align: center;
  font-weight: bold;
}
.alert.success {
  background-color: #d4edda;
  color: #155724;
}
.alert.error {
  background-color: #f8d7da;
  color: #721c24;
}

</style>

<?php include('includes/footer.php'); ?>
