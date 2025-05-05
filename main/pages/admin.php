<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sneaker Head Dashboard</title>
  <link rel="stylesheet" href="http://sneaker-head.local/assets/css/admin.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo">
        <img src="logo.png" alt="Sneaker Head Logo">
        <span>Sneaker Head</span>
      </div>
      <nav>
        <ul>
          <li><i class="fas fa-tachometer-alt"></i> Dashboard</li>
          <li><i class="fas fa-images"></i> Home Slides</li>
          <li><i class="fas fa-users"></i> Users</li>
          <li><i class="fas fa-box"></i> Products</li>
          <li><i class="fas fa-th-large"></i> Category</li>
          <li><i class="fas fa-shopping-cart"></i> Orders</li>
          <li><i class="fas fa-sign-out-alt"></i> Logout</li>
        </ul>
      </nav>
    </aside>

    <main class="main-content">
      <header class="dashboard-header">
        <div>
          <h1>Good Morning, Cameron</h1>
          <p>Here’s what’s happening on your store today. See the statistics at once.</p>
        </div>
        <button class="add-product-btn">+ Add Product</button>
      </header>

      <section class="stats">
        <div class="stat-card">
          <div class="icon"><i class="fas fa-gift"></i></div>
          <div>
            <p class="label">New Orders</p>
            <p class="value">1,390</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="icon"><i class="fas fa-chart-pie"></i></div>
          <div>
            <p class="label">Sales</p>
            <p class="value">$57,890</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="icon"><i class="fas fa-university"></i></div>
          <div>
            <p class="label">Revenue</p>
            <p class="value">$12,390</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="icon"><i class="fas fa-boxes"></i></div>
          <div>
            <p class="label">Total Products</p>
            <p class="value">1,390</p>
          </div>
        </div>
      </section>
    </main>
  </div>

  <script src="script.js"></script>
</body>
</html>
