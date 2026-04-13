<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grand Maison Hotel &amp; Restaurant</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* ---- Hero ---- */
    .hero {
      position: relative;
      height: 100vh;
      min-height: 620px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      overflow: hidden;
      margin-top: 72px;
    }
    .hero-bg {
      position: absolute;
      inset: 0;
      background: url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1600&q=85') center/cover no-repeat;
    }
    .hero-bg::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(to bottom,
        rgba(13,27,42,0.75) 0%,
        rgba(13,27,42,0.55) 50%,
        rgba(13,27,42,0.82) 100%);
    }
    .hero-content {
      position: relative;
      z-index: 1;
      padding: 0 20px;
      animation: fadeUp 1s ease both;
    }
    @keyframes fadeUp {
      from { opacity:0; transform:translateY(30px); }
      to   { opacity:1; transform:translateY(0); }
    }
    .hero-tagline {
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      font-size: 1.1rem;
      color: var(--gold-light);
      letter-spacing: 0.3em;
      text-transform: uppercase;
      margin-bottom: 16px;
      animation: fadeUp 1s 0.2s ease both;
    }
    .hero-title {
      font-size: clamp(2.8rem, 7vw, 5.5rem);
      color: var(--white);
      line-height: 1.1;
      margin-bottom: 20px;
      animation: fadeUp 1s 0.35s ease both;
    }
    .hero-title em {
      display: block;
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      color: var(--gold);
      font-size: 1.1em;
    }
    .hero-desc {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.2rem;
      color: var(--ivory-dark);
      max-width: 540px;
      margin: 0 auto 36px;
      animation: fadeUp 1s 0.5s ease both;
    }
    .hero-btns {
      display: flex;
      gap: 16px;
      justify-content: center;
      animation: fadeUp 1s 0.65s ease both;
    }
    .scroll-hint {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1;
      animation: bounce 2s infinite;
    }
    .scroll-hint span {
      display: block;
      width: 24px;
      height: 24px;
      border-right: 2px solid var(--gold);
      border-bottom: 2px solid var(--gold);
      transform: rotate(45deg);
      margin: -8px auto;
    }
    @keyframes bounce {
      0%,100% { transform: translateX(-50%) translateY(0); }
      50%      { transform: translateX(-50%) translateY(8px); }
    }

    /* ---- Features Strip ---- */
    .features-strip {
      background: var(--navy);
      padding: 28px 0;
    }
    .features-flex {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 20px;
    }
    .feature-item { text-align: center; }
    .feature-icon {
      font-size: 2rem;
      margin-bottom: 6px;
    }
    .feature-label {
      font-family: 'Cinzel', serif;
      font-size: 0.72rem;
      letter-spacing: 0.2em;
      color: var(--gold);
      text-transform: uppercase;
    }
    .feature-sub { font-size: 0.78rem; color: #8899aa; margin-top: 2px; }

    /* ---- Specialties ---- */
    .specials-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 28px;
    }
    .special-card {
      border-radius: 6px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(0,0,0,0.09);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: var(--white);
    }
    .special-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 16px 48px rgba(0,0,0,0.15);
    }
    .special-img {
      width: 100%;
      height: 210px;
      object-fit: cover;
    }
    .special-body { padding: 22px; }
    .special-badge {
      display: inline-block;
      background: var(--gold);
      color: var(--navy);
      font-family: 'Cinzel', serif;
      font-size: 0.62rem;
      letter-spacing: 0.18em;
      padding: 3px 10px;
      border-radius: 2px;
      margin-bottom: 10px;
      text-transform: uppercase;
    }

    /* ---- CTA Banner ---- */
    .cta-banner {
      background: linear-gradient(135deg, var(--navy) 0%, #162538 100%);
      padding: 70px 20px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .cta-banner::before {
      content: '';
      position: absolute;
      inset: 0;
      background: url('https://images.unsplash.com/photo-1600891964092-4316c288032e?w=1200&q=60') center/cover;
      opacity: 0.06;
    }
    .cta-banner h2 {
      font-size: clamp(1.8rem, 4vw, 3rem);
      color: var(--gold);
      margin-bottom: 12px;
      position: relative;
    }
    .cta-banner p {
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      font-size: 1.2rem;
      color: var(--ivory-dark);
      margin-bottom: 30px;
      position: relative;
    }
    .cta-banner .btn { position: relative; }

    /* ---- Testimonials ---- */
    .testimonials-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 28px;
    }
    .testimonial {
      background: var(--white);
      border-radius: 6px;
      padding: 30px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.06);
      position: relative;
    }
    .testimonial::before {
      content: '\201C';
      font-family: 'Cormorant Garamond', serif;
      font-size: 5rem;
      color: var(--gold);
      opacity: 0.3;
      position: absolute;
      top: 10px;
      left: 20px;
      line-height: 1;
    }
    .testimonial-text {
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      font-size: 1.1rem;
      color: var(--text-mid);
      margin-bottom: 18px;
      padding-top: 20px;
    }
    .testimonial-author {
      font-family: 'Cinzel', serif;
      font-size: 0.75rem;
      letter-spacing: 0.1em;
      color: var(--navy);
    }
    .testimonial-stars { color: var(--gold); font-size: 0.85rem; margin-bottom: 4px; }
  </style>
</head>
<body>

<?php include 'nav.php'; ?>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-content">
    <p class="hero-tagline">Welcome to</p>
    <h1 class="hero-title">Grand Maison<em>Hotel &amp; Restaurant</em></h1>
    <p class="hero-desc">An exquisite culinary journey where every dish tells a story and every visit becomes a memory.</p>
    <div class="hero-btns">
      <a href="menu.php"  class="btn btn--gold">Explore Our Menu</a>
      <a href="order.php" class="btn btn--outline">Order Now</a>
    </div>
  </div>
  <div class="scroll-hint">
    <span></span><span></span>
  </div>
</section>

<!-- FEATURES STRIP -->
<div class="features-strip">
  <div class="container">
    <div class="features-flex">
      <div class="feature-item">
        <div class="feature-icon">🍽️</div>
        <div class="feature-label">Fine Dining</div>
        <div class="feature-sub">Curated seasonal menus</div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">🐟</div>
        <div class="feature-label">Fresh Seafood</div>
        <div class="feature-sub">Ocean to table daily</div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">🍹</div>
        <div class="feature-label">Craft Cocktails</div>
        <div class="feature-sub">Artisanal beverages</div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">🚚</div>
        <div class="feature-label">Online Orders</div>
        <div class="feature-sub">Delivered to your door</div>
      </div>
    </div>
  </div>
</div>

<!-- CHEF'S SPECIALTIES -->
<section class="section section--ivory">
  <div class="container">
    <h2 class="section-title">Chef's Specialties</h2>
    <div class="gold-divider"></div>
    <p class="section-subtitle">Crafted with passion, served with elegance</p>
    <div class="specials-grid">
      <div class="special-card">
        <img class="special-img" src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600&q=80" alt="Grilled Tilapia">
        <div class="special-body">
          <span class="special-badge">Signature</span>
          <h3 class="card-title">Grilled Tilapia Royale</h3>
          <p class="card-text">Perfectly grilled fresh tilapia, lemon-herb butter, seasonal vegetables.</p>
          <p class="card-price">RWF 8,500</p>
        </div>
      </div>
      <div class="special-card">
        <img class="special-img" src="https://images.unsplash.com/photo-1621263764928-df1444c5e859?w=600&q=80" alt="Tropical Juice">
        <div class="special-body">
          <span class="special-badge">Refreshing</span>
          <h3 class="card-title">Tropical Sunrise Juice</h3>
          <p class="card-text">Freshly blended mango, pineapple, passion fruit, and a hint of ginger.</p>
          <p class="card-price">RWF 2,500</p>
        </div>
      </div>
      <div class="special-card">
        <img class="special-img" src="https://images.unsplash.com/photo-1544025162-d76694265947?w=600&q=80" alt="BBQ Ribs">
        <div class="special-body">
          <span class="special-badge">Popular</span>
          <h3 class="card-title">Slow-Smoked BBQ Ribs</h3>
          <p class="card-text">12-hour smoked pork ribs, house-made barbecue glaze, coleslaw.</p>
          <p class="card-price">RWF 14,000</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA BANNER -->
<div class="cta-banner">
  <div class="container">
    <h2>Ready to Place Your Order?</h2>
    <p>Enjoy restaurant-quality meals delivered right to your door.</p>
    <a href="order.php" class="btn btn--gold">Order Online Now</a>
  </div>
</div>

<!-- TESTIMONIALS -->
<section class="section section--gold-tint">
  <div class="container">
    <h2 class="section-title">What Our Guests Say</h2>
    <div class="gold-divider"></div>
    <p class="section-subtitle">Genuine experiences, genuine praise</p>
    <div class="testimonials-grid">
      <div class="testimonial">
        <div class="testimonial-stars">★★★★★</div>
        <p class="testimonial-text">The tilapia was absolutely divine — best I've had in Kigali. The ambience is unmatched.</p>
        <p class="testimonial-author">— Amara K., Kigali</p>
      </div>
      <div class="testimonial">
        <div class="testimonial-stars">★★★★★</div>
        <p class="testimonial-text">Ordered the tropical juice online and it arrived fresh and beautifully packaged. Will be back!</p>
        <p class="testimonial-author">— Jean-Pierre M., Gasabo</p>
      </div>
      <div class="testimonial">
        <div class="testimonial-stars">★★★★☆</div>
        <p class="testimonial-text">Grand Maison is our go-to for special occasions. The staff is incredibly attentive.</p>
        <p class="testimonial-author">— Sophie N., Nyamirambo</p>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>
