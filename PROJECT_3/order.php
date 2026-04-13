<?php
require 'db.php';

$success = $error = '';

/* ---- Handle Form Submission ---- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name  = trim($conn->real_escape_string($_POST['full_name']  ?? ''));
    $email      = trim($conn->real_escape_string($_POST['email']      ?? ''));
    $phone      = trim($conn->real_escape_string($_POST['phone']      ?? ''));
    $menu_item  = trim($conn->real_escape_string($_POST['menu_item']  ?? ''));
    $address    = trim($conn->real_escape_string($_POST['address']    ?? ''));
    $order_date = trim($conn->real_escape_string($_POST['order_date'] ?? ''));

    if (!$full_name || !$email || !$phone || !$menu_item || !$address || !$order_date) {
        $error = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $stmt = $conn->prepare(
            "INSERT INTO orders (full_name, email, phone, menu_item, address, order_date)
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param('ssssss', $full_name, $email, $phone, $menu_item, $address, $order_date);
        if ($stmt->execute()) {
            $success = "🎉 Thank you, <strong>{$full_name}</strong>! Your order for <strong>{$menu_item}</strong> has been placed. We'll confirm by email shortly.";
        } else {
            $error = 'Something went wrong. Please try again.';
        }
        $stmt->close();
    }
}

/* Pre-fill menu item from gallery link */
$preselect = htmlspecialchars($_GET['item'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Online — Grand Maison</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .order-layout {
      display: grid;
      grid-template-columns: 1fr 1.6fr;
      gap: 50px;
      align-items: start;
    }
    .order-info h3 { font-size: 1.2rem; color: var(--navy); margin-bottom: 14px; }
    .order-info p  { color: var(--text-mid); font-size: 0.9rem; line-height: 1.8; margin-bottom: 12px; }
    .info-list { margin-top: 20px; }
    .info-item {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 14px;
      padding: 12px 16px;
      background: var(--ivory);
      border-radius: 4px;
    }
    .info-icon { font-size: 1.4rem; }
    .info-text { font-size: 0.85rem; color: var(--text-mid); }
    .info-text strong { color: var(--navy); display: block; font-family: 'Cinzel', serif; font-size: 0.72rem; letter-spacing: 0.1em; }
    @media(max-width:820px) { .order-layout { grid-template-columns: 1fr; } }
  </style>
</head>
<body>
<?php include 'nav.php'; ?>

<div class="page-hero">
  <div class="hero-content">
    <h1>Order Online</h1>
    <p>Fresh, flavourful, delivered to you</p>
  </div>
</div>

<section class="section section--ivory">
  <div class="container">
    <h2 class="section-title">Place Your Order</h2>
    <div class="gold-divider"></div>
    <p class="section-subtitle">Fill in the form below and we will handle the rest</p>

    <div class="order-layout">

      <!-- Side Info -->
      <div class="order-info">
        <h3>How It Works</h3>
        <p>Order your favourite dishes online and we'll prepare them fresh. Choose a date, and we'll deliver or have your order ready for pick-up.</p>
        <div class="info-list">
          <div class="info-item"><span class="info-icon">📝</span><span class="info-text"><strong>Step 1</strong>Fill in your details and choose your menu item.</span></div>
          <div class="info-item"><span class="info-icon">✅</span><span class="info-text"><strong>Step 2</strong>We confirm your order via email or phone.</span></div>
          <div class="info-item"><span class="info-icon">🚚</span><span class="info-text"><strong>Step 3</strong>Enjoy fresh delivery or collect in-restaurant.</span></div>
          <div class="info-item"><span class="info-icon">📞</span><span class="info-text"><strong>Need Help?</strong>+250 780 000 000 — we're always here.</span></div>
        </div>
      </div>

      <!-- Order Form -->
      <div class="form-section">
        <?php if ($success): ?>
          <div class="alert alert--success"><?= $success ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
          <div class="alert alert--error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="order.php">

          <div class="form-row">
            <div class="form-group">
              <label for="full_name">Full Name *</label>
              <input type="text" id="full_name" name="full_name" placeholder="e.g. Jean Baptiste Nkusi" required
                     value="<?= htmlspecialchars($_POST['full_name'] ?? '') ?>">
            </div>
            <div class="form-group">
              <label for="email">Email Address *</label>
              <input type="email" id="email" name="email" placeholder="you@example.com" required
                     value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="phone">Phone Number *</label>
              <input type="tel" id="phone" name="phone" placeholder="+250 7XX XXX XXX" required
                     value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
            </div>
            <div class="form-group">
              <label for="order_date">Preferred Delivery Date *</label>
              <input type="date" id="order_date" name="order_date" required
                     min="<?= date('Y-m-d') ?>"
                     value="<?= htmlspecialchars($_POST['order_date'] ?? '') ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="menu_item">Select Menu Item *</label>
            <select id="menu_item" name="menu_item" required>
              <option value="">— Choose a dish or drink —</option>
              <optgroup label="🐟 Fish">
                <?php
                $fishItems = ['Grilled Tilapia Royale','Fried Nile Perch','Tilapia in Coconut Curry','Smoked Catfish Platter','Fish &amp; Chips','Baked Salmon Steak','Prawn Skewers'];
                foreach ($fishItems as $item) {
                    $sel = ($preselect === html_entity_decode($item) || ($_POST['menu_item'] ?? '') === $item) ? 'selected' : '';
                    echo "<option value=\"$item\" $sel>$item</option>";
                }
                ?>
              </optgroup>
              <optgroup label="🥩 Meat">
                <?php foreach (['Slow-Smoked BBQ Ribs','Beef Tenderloin Steak','Rwandan Brochettes','Chicken Tikka Masala','Lamb Chops Provençal','Mixed Grill Platter'] as $item):
                    $sel = (($_POST['menu_item'] ?? '') === $item) ? 'selected' : ''; ?>
                  <option value="<?= $item ?>" <?= $sel ?>><?= $item ?></option>
                <?php endforeach; ?>
              </optgroup>
              <optgroup label="🥗 Vegetarian">
                <?php foreach (['Vegetable Tagine','Caprese Salad','Mushroom Risotto','Grilled Halloumi Wrap','Garden Green Salad'] as $item):
                    $sel = (($_POST['menu_item'] ?? '') === $item) ? 'selected' : ''; ?>
                  <option value="<?= $item ?>" <?= $sel ?>><?= $item ?></option>
                <?php endforeach; ?>
              </optgroup>
              <optgroup label="🍊 Fresh Juices">
                <?php foreach (['Tropical Sunrise Juice','Green Detox Juice','Beetroot Berry Blast','Fresh Orange Juice','Watermelon Mint','Avocado Smoothie','Carrot &amp; Turmeric Boost'] as $item):
                    $sel = ($preselect === html_entity_decode($item) || ($_POST['menu_item'] ?? '') === $item) ? 'selected' : ''; ?>
                  <option value="<?= $item ?>" <?= $sel ?>><?= $item ?></option>
                <?php endforeach; ?>
              </optgroup>
              <optgroup label="🍹 Drinks">
                <?php foreach (['Sparkling Water','Still Water','Rwandan Coffee','Mint Tea','Coca-Cola / Fanta / Sprite','House Lemonade','Mango Lassi','Masala Chai'] as $item):
                    $sel = (($_POST['menu_item'] ?? '') === $item) ? 'selected' : ''; ?>
                  <option value="<?= $item ?>" <?= $sel ?>><?= $item ?></option>
                <?php endforeach; ?>
              </optgroup>
              <optgroup label="🍰 Desserts">
                <?php foreach (['Chocolate Lava Cake','Crème Brûlée','Mango Sorbet','Tiramisu','Fruit Pavlova'] as $item):
                    $sel = (($_POST['menu_item'] ?? '') === $item) ? 'selected' : ''; ?>
                  <option value="<?= $item ?>" <?= $sel ?>><?= $item ?></option>
                <?php endforeach; ?>
              </optgroup>
            </select>
          </div>

          <div class="form-group">
            <label for="address">Delivery Address *</label>
            <textarea id="address" name="address" placeholder="Enter your full delivery address..." required><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>
          </div>

          <button type="submit" class="btn btn--gold" style="width:100%;justify-content:center;font-size:.85rem;">
            🛒 &nbsp;Submit Order
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
</body>
</html>
