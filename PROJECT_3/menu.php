<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu — Grand Maison</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .menu-tabs {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 12px;
      margin-bottom: 44px;
    }
    .tab-btn {
      padding: 10px 26px;
      background: transparent;
      border: 2px solid var(--navy);
      border-radius: 40px;
      font-family: 'Cinzel', serif;
      font-size: 0.72rem;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      cursor: pointer;
      color: var(--navy);
      transition: var(--transition);
    }
    .tab-btn.active,
    .tab-btn:hover {
      background: var(--navy);
      color: var(--gold);
    }

    .menu-section { display: none; }
    .menu-section.active { display: block; }

    .table-wrapper {
      background: var(--white);
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(0,0,0,0.08);
      margin-bottom: 40px;
    }

    .fancy-table .badge {
      display: inline-block;
      background: var(--gold);
      color: var(--navy);
      font-size: 0.62rem;
      padding: 2px 8px;
      border-radius: 20px;
      font-weight: 700;
      letter-spacing: 0.1em;
      margin-left: 6px;
      vertical-align: middle;
    }
    .fancy-table .badge--new    { background: #4caf50; color: #fff; }
    .fancy-table .badge--spicy  { background: #e53935; color: #fff; }
    .fancy-table .badge--veg    { background: #66bb6a; color: #fff; }

    .order-cta {
      text-align: center;
      background: var(--navy);
      padding: 32px;
      border-radius: 8px;
      margin-top: 40px;
    }
    .order-cta p { color: var(--ivory-dark); font-size: 1rem; margin-bottom: 16px; }
  </style>
</head>
<body>
<?php include 'nav.php'; ?>

<div class="page-hero">
  <div class="hero-content">
    <h1>Our Menu</h1>
    <p>A symphony of flavours, crafted with love</p>
  </div>
</div>

<section class="section section--ivory">
  <div class="container">
    <h2 class="section-title">Explore Our Offerings</h2>
    <div class="gold-divider"></div>
    <p class="section-subtitle">All prices in Rwandan Francs (RWF) — inclusive of taxes</p>

    <!-- Tab Buttons -->
    <div class="menu-tabs">
      <button class="tab-btn active" onclick="showTab('fish',this)">🐟 Fish</button>
      <button class="tab-btn" onclick="showTab('meat',this)">🥩 Meat</button>
      <button class="tab-btn" onclick="showTab('vegetarian',this)">🥗 Vegetarian</button>
      <button class="tab-btn" onclick="showTab('juice',this)">🍊 Fresh Juices</button>
      <button class="tab-btn" onclick="showTab('drinks',this)">🍹 Drinks</button>
      <button class="tab-btn" onclick="showTab('desserts',this)">🍰 Desserts</button>
    </div>

    <!-- FISH -->
    <div class="menu-section active" id="fish">
      <div class="table-wrapper">
        <table class="fancy-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Dish Name</th>
              <th>Description</th>
              <th>Preparation</th>
              <th class="price-cell">Price (RWF)</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>Grilled Tilapia Royale <span class="badge">Signature</span></td><td>Whole tilapia, lemon-herb butter, steamed vegetables</td><td>Grilled</td><td class="price-cell">8,500</td></tr>
            <tr><td>2</td><td>Fried Nile Perch <span class="badge--spicy badge">Spicy</span></td><td>Golden-fried Nile perch, spiced batter, tartare sauce</td><td>Deep Fried</td><td class="price-cell">9,000</td></tr>
            <tr><td>3</td><td>Tilapia in Coconut Curry</td><td>Tilapia fillets in creamy coconut-tomato curry, basmati rice</td><td>Stewed</td><td class="price-cell">10,500</td></tr>
            <tr><td>4</td><td>Smoked Catfish Platter</td><td>Traditionally smoked catfish, ugali, sautéed greens</td><td>Smoked</td><td class="price-cell">7,500</td></tr>
            <tr><td>5</td><td>Fish &amp; Chips <span class="badge--new badge">New</span></td><td>Beer-battered tilapia, crispy fries, lemon wedge, mushy peas</td><td>Fried</td><td class="price-cell">8,000</td></tr>
            <tr><td>6</td><td>Baked Salmon Steak</td><td>Atlantic salmon, dill cream sauce, roasted potatoes</td><td>Baked</td><td class="price-cell">14,000</td></tr>
            <tr><td>7</td><td>Prawn Skewers</td><td>Marinated tiger prawns, chimichurri, grilled corn salad</td><td>Grilled</td><td class="price-cell">12,500</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- MEAT -->
    <div class="menu-section" id="meat">
      <div class="table-wrapper">
        <table class="fancy-table">
          <thead>
            <tr><th>#</th><th>Dish Name</th><th>Description</th><th>Preparation</th><th class="price-cell">Price (RWF)</th></tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>Slow-Smoked BBQ Ribs <span class="badge">Popular</span></td><td>12-hour smoked pork ribs, house BBQ glaze, coleslaw</td><td>Smoked</td><td class="price-cell">14,000</td></tr>
            <tr><td>2</td><td>Beef Tenderloin Steak <span class="badge--spicy badge">Chef's Pick</span></td><td>200g tenderloin, red wine reduction, truffle mash</td><td>Pan-seared</td><td class="price-cell">18,500</td></tr>
            <tr><td>3</td><td>Rwandan Brochettes</td><td>Spiced goat skewers, fried plantains, tomato-onion salsa</td><td>Grilled</td><td class="price-cell">6,500</td></tr>
            <tr><td>4</td><td>Chicken Tikka Masala</td><td>Tender chicken, rich tomato-cream sauce, naan bread</td><td>Braised</td><td class="price-cell">9,500</td></tr>
            <tr><td>5</td><td>Lamb Chops Provençal</td><td>Herb-crusted lamb chops, ratatouille, roasted garlic jus</td><td>Roasted</td><td class="price-cell">16,000</td></tr>
            <tr><td>6</td><td>Mixed Grill Platter</td><td>Chicken, beef, lamb, goat; served with fries and 2 dips</td><td>Grilled</td><td class="price-cell">22,000</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- VEGETARIAN -->
    <div class="menu-section" id="vegetarian">
      <div class="table-wrapper">
        <table class="fancy-table">
          <thead>
            <tr><th>#</th><th>Dish Name</th><th>Description</th><th>Type</th><th class="price-cell">Price (RWF)</th></tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>Vegetable Tagine <span class="badge--veg badge">Vegan</span></td><td>Slow-cooked seasonal vegetables, ras el hanout, couscous</td><td>Main</td><td class="price-cell">7,000</td></tr>
            <tr><td>2</td><td>Caprese Salad</td><td>Heirloom tomatoes, fresh mozzarella, basil, extra-virgin olive oil</td><td>Starter</td><td class="price-cell">4,500</td></tr>
            <tr><td>3</td><td>Mushroom Risotto</td><td>Arborio rice, wild mushrooms, parmesan, truffle oil</td><td>Main</td><td class="price-cell">8,500</td></tr>
            <tr><td>4</td><td>Grilled Halloumi Wrap <span class="badge--new badge">New</span></td><td>Grilled halloumi, roasted peppers, hummus, warm flatbread</td><td>Main</td><td class="price-cell">6,000</td></tr>
            <tr><td>5</td><td>Garden Green Salad <span class="badge--veg badge">Vegan</span></td><td>Mixed greens, cucumber, avocado, lemon-tahini dressing</td><td>Starter</td><td class="price-cell">3,500</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- FRESH JUICES -->
    <div class="menu-section" id="juice">
      <div class="table-wrapper">
        <table class="fancy-table">
          <thead>
            <tr><th>#</th><th>Juice Name</th><th>Ingredients</th><th>Size</th><th class="price-cell">Price (RWF)</th></tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>Tropical Sunrise <span class="badge">Best Seller</span></td><td>Mango, pineapple, passion fruit, ginger</td><td>500ml</td><td class="price-cell">2,500</td></tr>
            <tr><td>2</td><td>Green Detox</td><td>Spinach, cucumber, green apple, lemon, mint</td><td>400ml</td><td class="price-cell">2,800</td></tr>
            <tr><td>3</td><td>Beetroot Berry Blast</td><td>Beetroot, strawberry, raspberry, honey</td><td>400ml</td><td class="price-cell">3,000</td></tr>
            <tr><td>4</td><td>Fresh Orange Juice</td><td>Freshly squeezed oranges</td><td>300ml</td><td class="price-cell">1,800</td></tr>
            <tr><td>5</td><td>Watermelon Mint</td><td>Watermelon, fresh mint, lime</td><td>500ml</td><td class="price-cell">2,200</td></tr>
            <tr><td>6</td><td>Avocado Smoothie</td><td>Ripe avocado, banana, honey, milk</td><td>400ml</td><td class="price-cell">3,200</td></tr>
            <tr><td>7</td><td>Carrot &amp; Turmeric Boost</td><td>Carrot, turmeric, orange, black pepper</td><td>350ml</td><td class="price-cell">2,600</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- DRINKS -->
    <div class="menu-section" id="drinks">
      <div class="table-wrapper">
        <table class="fancy-table">
          <thead>
            <tr><th>#</th><th>Drink Name</th><th>Description</th><th>Volume</th><th class="price-cell">Price (RWF)</th></tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>Sparkling Water</td><td>Premium naturally carbonated mineral water</td><td>750ml</td><td class="price-cell">1,200</td></tr>
            <tr><td>2</td><td>Still Water</td><td>Chilled still mineral water</td><td>750ml</td><td class="price-cell">800</td></tr>
            <tr><td>3</td><td>Rwandan Coffee</td><td>Single-origin Rwandan Arabica, black or with milk</td><td>250ml</td><td class="price-cell">1,500</td></tr>
            <tr><td>4</td><td>Mint Tea</td><td>Fresh mint leaves, hot water, honey on side</td><td>–</td><td class="price-cell">1,200</td></tr>
            <tr><td>5</td><td>Coca-Cola / Fanta / Sprite</td><td>Chilled soft drinks</td><td>330ml</td><td class="price-cell">1,000</td></tr>
            <tr><td>6</td><td>House Lemonade</td><td>Freshly squeezed lemon, sugar syrup, sparkling water</td><td>400ml</td><td class="price-cell">2,000</td></tr>
            <tr><td>7</td><td>Mango Lassi</td><td>Mango, yoghurt, cardamom, rose water</td><td>350ml</td><td class="price-cell">2,400</td></tr>
            <tr><td>8</td><td>Masala Chai</td><td>Spiced milk tea — cinnamon, cardamom, ginger, clove</td><td>300ml</td><td class="price-cell">1,600</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- DESSERTS -->
    <div class="menu-section" id="desserts">
      <div class="table-wrapper">
        <table class="fancy-table">
          <thead>
            <tr><th>#</th><th>Dessert Name</th><th>Description</th><th>Allergens</th><th class="price-cell">Price (RWF)</th></tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>Chocolate Lava Cake <span class="badge">Popular</span></td><td>Warm dark chocolate cake, molten centre, vanilla ice cream</td><td>Gluten, Dairy, Eggs</td><td class="price-cell">4,500</td></tr>
            <tr><td>2</td><td>Crème Brûlée</td><td>Classic vanilla custard, caramelised sugar crust</td><td>Dairy, Eggs</td><td class="price-cell">3,800</td></tr>
            <tr><td>3</td><td>Mango Sorbet <span class="badge--veg badge">Vegan</span></td><td>House-made mango sorbet, mint, lime zest</td><td>None</td><td class="price-cell">2,800</td></tr>
            <tr><td>4</td><td>Tiramisu</td><td>Espresso-soaked ladyfingers, mascarpone, cocoa</td><td>Gluten, Dairy, Eggs</td><td class="price-cell">4,000</td></tr>
            <tr><td>5</td><td>Fruit Pavlova</td><td>Crisp meringue, whipped cream, seasonal fresh fruits</td><td>Eggs, Dairy</td><td class="price-cell">3,500</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="order-cta">
      <p>Enjoyed the menu? Place your order online — we'll bring it right to you!</p>
      <a href="order.php" class="btn btn--gold">Order Online</a>
    </div>

  </div>
</section>

<?php include 'footer.php'; ?>

<script>
  function showTab(id, btn) {
    document.querySelectorAll('.menu-section').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    btn.classList.add('active');
  }
</script>
</body>
</html>
