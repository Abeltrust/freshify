<?php
include('includes/init.php');
include('includes/header.php');
?>

<div class="about-wrapper">
  <h1>About Us</h1>
  <p class="intro">Welcome to <strong>Freshify</strong> — your trusted partner for fresh, organic, and locally sourced products. We're here to make your lifestyle healthier and more sustainable.</p>

  <div class="cards-section">
    <div class="card fade-in">
      <h2>Our Vision</h2>
      <p>To become the most trusted and sustainable provider of fresh goods across the nation, connecting farms to homes.</p>
    </div>
    <div class="card fade-in">
      <h2>Our Mission</h2>
      <p>To deliver quality produce while supporting local farmers, minimizing food waste, and prioritizing our planet.</p>
    </div>
  </div>

  <div class="team-section">
    <h2>Meet the Team</h2>
    <div class="team-grid">
      <div class="team-card fade-in">
        <img src="images/team3.jpg" alt="Jane" />
        <h3>John Smith</h3>
        <p>Operations Lead</p>
      </div>
      <div class="team-card fade-in">
        <img src="images/team2.jpg" alt="John" />
        <h3>Abel Bitrus Duba</h3>
        <p>Founder & CEO</p>
      </div>
      <div class="team-card fade-in">
        <img src="images/team3.jpg" alt="Amaka" />
        <h3>John Samson</h3>
        <p>Creative Director</p>
      </div>
    </div>
  </div>
</div>

<style>
  .about-wrapper {
    max-width: 1100px;
    margin: 60px auto;
    padding: 40px 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 20px;
  }

  .intro {
    text-align: center;
    font-size: 1.1rem;
    color: #555;
    max-width: 800px;
    margin: auto;
    margin-bottom: 40px;
  }

  .cards-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    margin-bottom: 50px;
  }

  .card {
    background: #f6fff7;
    border-left: 5px solid #56ab2f;
    padding: 25px;
    border-radius: 10px;
    width: 320px;
    transition: transform 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
  }

  .card h2 {
    margin-top: 0;
    color: #333;
  }

  .card p {
    color: #555;
    font-size: 1rem;
  }

  .team-section {
    text-align: center;
  }

  .team-section h2 {
    margin-bottom: 30px;
    color: #333;
  }

  .team-grid {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
  }

  .team-card {
    width: 220px;
    background: #f1f1f1;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.07);
  }

  .team-card:hover {
    transform: translateY(-5px);
  }

  .team-card img {
    width: 100%;
    height: auto;
    display: block;
  }

  .team-card h3 {
    margin: 15px 0 5px;
    color: #333;
  }

  .team-card p {
    margin-bottom: 15px;
    color: #777;
  }

  .fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
  }

  .fade-in:nth-child(1) { animation-delay: 0.2s; }
  .fade-in:nth-child(2) { animation-delay: 0.4s; }
  .fade-in:nth-child(3) { animation-delay: 0.6s; }

  @keyframes fadeInUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 768px) {
    .cards-section, .team-grid {
      flex-direction: column;
      align-items: center;
    }
  }
</style>

<?php include('includes/footer.php'); ?>
