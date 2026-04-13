<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery — Grand Maison</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .gallery-intro {
      text-align: center;
      max-width: 600px;
      margin: 0 auto 50px;
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      font-size: 1.1rem;
      color: var(--text-mid);
    }

    /* 5-column masonry-inspired grid */
    .gallery-masonry {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
    }
    .gallery-masonry .gallery-item:nth-child(1),
    .gallery-masonry .gallery-item:nth-child(4) {
      grid-column: span 2;
    }

    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 6px;
      aspect-ratio: 4/3;
      display: block;        /* <a> tag wraps the item */
      cursor: pointer;
    }
    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
      display: block;
    }
    .gallery-item:hover img { transform: scale(1.09); }

    .gallery-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(13,27,42,0.88) 0%, transparent 55%);
      opacity: 0;
      transition: opacity 0.35s;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 22px 20px;
    }
    .gallery-item:hover .gallery-overlay { opacity: 1; }

    .gallery-label {
      font-family: 'Cinzel', serif;
      font-size: 1rem;
      color: var(--white);
      margin-bottom: 6px;
    }
    .gallery-desc {
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      font-size: 0.88rem;
      color: var(--ivory-dark);
      margin-bottom: 10px;
    }
    .gallery-cta {
      display: inline-block;
      padding: 7px 18px;
      background: var(--gold);
      color: var(--navy);
      font-family: 'Cinzel', serif;
      font-size: 0.68rem;
      letter-spacing: 0.14em;
      border-radius: 3px;
      transition: background 0.2s;
    }
    .gallery-item:hover .gallery-cta { background: var(--gold-light); }

    .gallery-footer-note {
      text-align: center;
      margin-top: 36px;
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      color: var(--text-light);
      font-size: 1rem;
    }
    .gallery-footer-note a { color: var(--gold); text-decoration: underline; }

    @media(max-width:768px) {
      .gallery-masonry {
        grid-template-columns: 1fr 1fr;
      }
      .gallery-masonry .gallery-item:nth-child(1),
      .gallery-masonry .gallery-item:nth-child(4) { grid-column: span 1; }
    }
    @media(max-width:480px) {
      .gallery-masonry { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>
<?php include 'nav.php'; ?>

<div class="page-hero">
  <div class="hero-content">
    <h1>Gallery</h1>
    <p>A visual feast — click any image to order</p>
  </div>
</div>

<section class="section section--ivory">
  <div class="container">
    <h2 class="section-title">Our Food &amp; Drinks</h2>
    <div class="gold-divider"></div>
    <p class="gallery-intro">Each photograph captures a dish crafted with care, plated with artistry, and waiting to be savoured. Click any image to place your order.</p>

    <div class="gallery-masonry">

      <!-- Image 1 — Grilled Tilapia -->
      <a href="order.php?item=Grilled+Tilapia+Royale" class="gallery-item">
        <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=900&q=85" alt="Grilled Tilapia Royale">
        <div class="gallery-overlay">
          <p class="gallery-label">Grilled Tilapia Royale</p>
          <p class="gallery-desc">Our signature fish dish — lemon-herb buttered perfection</p>
          <span class="gallery-cta">Order Now →</span>
        </div>
      </a>

      <!-- Image 2 — Tropical Juice -->
      <a href="order.php?item=Tropical+Sunrise+Juice" class="gallery-item">
        <img src="https://images.unsplash.com/photo-1621263764928-df1444c5e859?w=700&q=85" alt="Tropical Sunrise Juice">
        <div class="gallery-overlay">
          <p class="gallery-label">Tropical Sunrise Juice</p>
          <p class="gallery-desc">Mango, pineapple, passion fruit, fresh ginger</p>
          <span class="gallery-cta">Order Now →</span>
        </div>
      </a>

      <!-- Image 3 — BBQ Ribs -->
      <a href="order.php?item=Slow-Smoked+BBQ+Ribs" class="gallery-item">
        <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=700&q=85" alt="BBQ Ribs">
        <div class="gallery-overlay">
          <p class="gallery-label">Slow-Smoked BBQ Ribs</p>
          <p class="gallery-desc">12-hour smoked, fall-off-the-bone tender</p>
          <span class="gallery-cta">Order Now →</span>
        </div>
      </a>

      <!-- Image 4 — Dessert (spans 2 cols) -->
      <a href="order.php?item=Chocolate+Lava+Cake" class="gallery-item">
        <img src="https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=900&q=85" alt="Chocolate Lava Cake">
        <div class="gallery-overlay">
          <p class="gallery-label">Chocolate Lava Cake</p>
          <p class="gallery-desc">Warm dark chocolate, molten centre, vanilla ice cream</p>
          <span class="gallery-cta">Order Now →</span>
        </div>
      </a>

      <!-- Image 5 — Prawn Skewers -->
      <a href="order.php?item=Prawn+Skewers" class="gallery-item">
        <img src="https://images.unsplash.com/photo-1565680018434-b513d5e5fd47?w=700&q=85" alt="Prawn Skewers">
        <div class="gallery-overlay">
          <p class="gallery-label">Prawn Skewers</p>
          <p class="gallery-desc">Tiger prawns, chimichurri, grilled corn salad</p>
          <span class="gallery-cta">Order Now →</span>
        </div>
      </a>

      <!-- Image 6 — Green Detox Juice -->
      <a href="order.php?item=Green+Detox+Juice" class="gallery-item">
        <img src="https://images.unsplash.com/photo-1610970881699-44a5587cabec?w=700&q=85" alt="Green Detox Juice">
        <div class="gallery-overlay">
          <p class="gallery-label">Green Detox Juice</p>
          <p class="gallery-desc">Spinach, cucumber, green apple, lemon, mint</p>
          <span class="gallery-cta">Order Now →</span>
        </div>
      </a>

      <!-- Image 7 — Beef Steak -->
      <a href="order.php?item=Beef+Tenderloin+Steak" class="gallery-item">
        <img src="https://images.unsplash.com/photo-1600891964092-4316c288032e?w=700&q=85" alt="Beef Tenderloin Steak">
        <div class="gallery-overlay">
          <p class="gallery-label">Beef Tenderloin Steak</p>
          <p class="gallery-desc">200g premium cut, red wine reduction, truffle mash</p>
          <span class="gallery-cta">Order Now →</span>
        </div>
      </a>

      <!-- Image 8 — Avocado Smoothie -->
      <a href="order.php?item=Avocado+Smoothie" class="gallery-item">
        <img src="https://images.unsplash.com/photo-1553530666-ba11a7da3888?w=700&q=85" alt="Avocado Smoothie">
        <div class="gallery-overlay">
          <p class="gallery-label">Avocado Smoothie</p>
          <p class="gallery-desc">Ripe avocado, banana, honey, chilled milk</p>
          <span class="gallery-cta">Order Now →</span>
        </div>
      </a>

      <!-- Image 9 — Brochettes -->
      <a href="order.php?item=Rwandan+Brochettes" class="gallery-item">
        <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=700&q=85" alt="Rwandan Brochettes">
        <div class="gallery-overlay">
          <p class="gallery-label">Rwandan Brochettes</p>
          <p class="gallery-desc">Spiced goat skewers, fried plantains, tomato salsa</p>
          <span class="gallery-cta">Order Now →</span>
        </div>
      </a>

    </div>

    <p class="gallery-footer-note">
      Tempted? &nbsp;<a href="order.php">Place your order online</a> &nbsp;or browse our <a href="menu.php">full menu</a>.
    </p>
  </div>
</section>

<?php include 'footer.php'; ?>
</body>
</html>
