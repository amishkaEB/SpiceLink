<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SpiceCraft - Products</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: #f9fafc;
      color: #333;
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background: #fff;
      height: 100vh;
      border-right: 1px solid #ddd;
      padding: 20px 0;
      position: fixed;
      top: 0;
      left: 0;
      transition: transform 0.3s ease;
      z-index: 1000;
    }

    .sidebar h2 {
      color: #f77f00;
      font-size: 20px;
      padding: 0 20px;
      margin-bottom: 30px;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar ul li {
      padding: 15px 20px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: background 0.2s;
      font-size: 15px;
    }

    .sidebar ul li:hover,
    .sidebar ul li.active {
      background: #f77f00;
      color: #fff;
    }

    .sidebar ul li i {
      width: 18px;
      text-align: center;
    }

    /* Main */
    .main {
      margin-left: 220px;
      transition: margin-left 0.3s ease;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      padding: 15px 25px;
      background: #fff;
      border-bottom: 1px solid #ddd;
      position: sticky;
      top: 0;
      z-index: 500;
    }

    .navbar i {
      font-size: 18px;
      margin-right: 20px;
      cursor: pointer;
      color: #333;
    }

    .navbar img {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
    }

    .toggle-btn {
      display: none;
      margin-right: auto;
      font-size: 22px;
      cursor: pointer;
      color: #333;
    }

    /* Main Content */
    .main-content {
      padding: 20px 40px;
      flex: 1;
    }

    .main-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      flex-wrap: wrap;
    }

    .main-header h1 {
      font-size: 24px;
    }

    .btn-add {
      background: #f77f00;
      color: #fff;
      border: none;
      padding: 10px 16px;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .btn-add:hover {
      background: #e56f00;
    }

    /* Search */
    .search-box {
      margin-bottom: 20px;
    }

    .search-box input {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    /* Table */
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 16px;
      text-align: left;
      border-bottom: 1px solid #f0f0f0;
    }

    th {
      background: #fafafa;
      font-weight: bold;
    }

    /* Status */
    .status {
      padding: 4px 10px;
      border-radius: 12px;
      font-size: 12px;
      font-weight: bold;
      display: inline-block;
    }

    .in-stock { background: #e6f9ec; color: #2e7d32; }
    .low-stock { background: #fff8e1; color: #f9a825; }
    .out-stock { background: #fdecea; color: #c62828; }

    /* Actions */
    .actions a {
      margin-right: 12px;
      text-decoration: none;
      font-size: 14px;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    .edit { color: #1976d2; }
    .delete { color: #c62828; }

    /* Responsive */
    @media (max-width: 991px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.active {
        transform: translateX(0);
      }
      .main {
        margin-left: 0;
      }
      .toggle-btn {
        display: block;
      }
      .main-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }
    }

    @media (max-width: 576px) {
      th, td {
        font-size: 12px;
        padding: 10px;
      }
      .btn-add {
        font-size: 12px;
        padding: 8px 12px;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <h2><i class="fa-solid fa-seedling"></i> SpiceCraft</h2>
    <ul>
      <li class="active"><i class="fa-solid fa-table-columns"></i> Dashboard</li>
      <li><i class="fa-solid fa-cart-shopping"></i> Orders</li>
      <li><i class="fa-solid fa-user-group"></i> Customers</li>
      <li><i class="fa-solid fa-chart-line"></i> Reports</li>
    </ul>
  </div>

  <!-- Main -->
  <div class="main">
    <!-- Navbar -->
    <div class="navbar">
      <i class="fa-solid fa-bars toggle-btn" id="toggleBtn"></i>
      <i class="fa-regular fa-bell"></i>
      <img src="https://i.pravatar.cc/150?img=47" alt="User Profile">
    </div>

    <!-- Content -->
    <div class="main-content">
      <div class="main-header">
        <h1>Products</h1>
        <button class="btn-add"><i class="fa-solid fa-plus"></i> Add New Product</button>
      </div>

      <div class="search-box">
        <input type="text" id="search" placeholder="Search products...">
      </div>

      <div class="table-responsive">
        <table id="productTable" class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Saffron Threads</td>
              <td>Exotic Spices</td>
              <td>$15.99</td>
              <td>120</td>
              <td><span class="status in-stock">In Stock</span></td>
              <td class="actions">
                <a href="#" class="edit"><i class="fa-solid fa-pen"></i> Edit</a>
                <a href="#" class="delete"><i class="fa-solid fa-trash"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>Cinnamon Sticks</td>
              <td>Baking Spices</td>
              <td>$4.50</td>
              <td>300</td>
              <td><span class="status in-stock">In Stock</span></td>
              <td class="actions">
                <a href="#" class="edit"><i class="fa-solid fa-pen"></i> Edit</a>
                <a href="#" class="delete"><i class="fa-solid fa-trash"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>Black Peppercorns</td>
              <td>Everyday Spices</td>
              <td>$3.25</td>
              <td>500</td>
              <td><span class="status in-stock">In Stock</span></td>
              <td class="actions">
                <a href="#" class="edit"><i class="fa-solid fa-pen"></i> Edit</a>
                <a href="#" class="delete"><i class="fa-solid fa-trash"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>Turmeric Powder</td>
              <td>Health & Wellness</td>
              <td>$6.75</td>
              <td>250</td>
              <td><span class="status low-stock">Low Stock</span></td>
              <td class="actions">
                <a href="#" class="edit"><i class="fa-solid fa-pen"></i> Edit</a>
                <a href="#" class="delete"><i class="fa-solid fa-trash"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>Smoked Paprika</td>
              <td>Gourmet Blends</td>
              <td>$8.00</td>
              <td>150</td>
              <td><span class="status in-stock">In Stock</span></td>
              <td class="actions">
                <a href="#" class="edit"><i class="fa-solid fa-pen"></i> Edit</a>
                <a href="#" class="delete"><i class="fa-solid fa-trash"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>Chili Flakes</td>
              <td>Hot & Spicy</td>
              <td>$4.00</td>
              <td>400</td>
              <td><span class="status in-stock">In Stock</span></td>
              <td class="actions">
                <a href="#" class="edit"><i class="fa-solid fa-pen"></i> Edit</a>
                <a href="#" class="delete"><i class="fa-solid fa-trash"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>Ginger Root</td>
              <td>Baking Spices</td>
              <td>$5.50</td>
              <td>200</td>
              <td><span class="status out-stock">Out of Stock</span></td>
              <td class="actions">
                <a href="#" class="edit"><i class="fa-solid fa-pen"></i> Edit</a>
                <a href="#" class="delete"><i class="fa-solid fa-trash"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>Cumin Seeds</td>
              <td>Everyday Spices</td>
              <td>$3.00</td>
              <td>450</td>
              <td><span class="status in-stock">In Stock</span></td>
              <td class="actions">
                <a href="#" class="edit"><i class="fa-solid fa-pen"></i> Edit</a>
                <a href="#" class="delete"><i class="fa-solid fa-trash"></i> Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Sidebar toggle
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('active');
    });

    // Search filter
    document.getElementById('search').addEventListener('keyup', function() {
      let filter = this.value.toLowerCase();
      let rows = document.querySelectorAll('#productTable tbody tr');
      
      rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
      });
    });
  </script>
</body>
</html>
