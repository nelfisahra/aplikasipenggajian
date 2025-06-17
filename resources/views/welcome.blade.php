<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Landing Page - Konversi Tinggi</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f3f4fc;
      color: #333;
    }

    /* Navigation Styles */
    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #3e4eb8;
      padding: 20px;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-size: 16px;
      margin: 0 15px;
      font-weight: 500;
    }

    nav a:hover {
      text-decoration: underline;
    }

    /* Hero Section */
    .hero {
      background: #3e4eb8;
      padding: 60px 20px 80px;
      text-align: center;
      color: white;
      position: relative;
      overflow: hidden;
    }

    .hero img.logo {
      width: 70px;
      margin-bottom: 20px;
    }

    .hero h1 {
      font-size: 24px;
      letter-spacing: 1px;
    }

    .hero h2 {
      font-size: 42px;
      font-weight: 700;
      margin-top: 10px;
      letter-spacing: 3px;
    }

    .dots {
      margin-top: 20px;
    }

    .dots span {
      display: inline-block;
      width: 10px;
      height: 10px;
      background-color: white;
      border-radius: 50%;
      margin: 0 5px;
      opacity: 0.6;
    }

    .preview-section {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 40px 20px;
      background: white;
      gap: 30px;
    }

    .card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 320px;
      padding: 20px;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      border-radius: 12px;
      margin-bottom: 15px;
    }

    .card h3 {
      font-size: 18px;
      margin-bottom: 8px;
      color: #222;
    }

    .card p {
      font-size: 14px;
      color: #555;
    }

    @media (max-width: 768px) {
      .hero h2 {
        font-size: 32px;
      }

      .card {
        width: 100%;
        max-width: 350px;
      }
    }
  </style>
</head>
<body>

  <!-- Navigation Bar -->
  <nav>
    <a href="#home">Berandaa</a>
    <a class="nav-link" href="{{ route('admin.login') }}">Login Admin</a>  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <img src="elementor-logo.png" alt="Elementor Logo" class="logo" />
    <h1>Konversi Tinggi</h1>
    <h2>LANDING PAGE</h2>
    <div class="dots">
      <span></span><span></span><span></span><span></span><span></span>
    </div>
  </section>

  <!-- Preview Cards -->
  <section class="preview-section">
    <div class="card">
      <img src="preview-1.png" alt="Preview 1" />
      <h3>Do a lot more with less</h3>
      <p>We are grounded in humanity</p>
    </div>
    <div class="card">
      <img src="preview-2.png" alt="Preview 2" />
      <h3>Small Change, Big Impact</h3>
      <p>Round Up And Give</p>
    </div>
  </section>

</body>
</html>
