<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SpiceCraft - Orders</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
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
      vertical-align: middle;
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

    .shipped { background: #e6f0ff; color: #0066cc; }
    .processing { background: #fff3cd; color: #b08900; }
    .delivered { background: #d1f7d6; color: #1d7a2f; }

    /* Actions */
    .actions a {
      margin-right: 12px;
      text-decoration: none;
      font-size: 14px;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    .actions a:nth-child(1) { color: #007bff; }
    .actions a:nth-child(2) { color: #28a745; }
    .actions a:nth-child(3) { color: #dc3545; }

    /* Pagination */
    .pagination {
      display: flex;
      justify-content: flex-end;
      margin-top: 15px;
      gap: 10px;
    }

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
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <h2><i class="fa-solid fa-seedling"></i> SpiceCraft</h2>
    <ul>
      <li><i class="fa-solid fa-table-columns"></i> Dashboard</li>
      <li><i class="fa-solid fa-box"></i> Products</li>
      <li><i class="fa-solid fa-users"></i> Customers</li>
      <li class="active"><i class="fa-solid fa-receipt"></i> Orders</li>
      <li><i class="fa-solid fa-warehouse"></i> Inventory</li>
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
        <h1>Orders</h1>
      </div>

      <div class="search-box">
        <input type="text" id="search" placeholder="Search by Order ID or Customer Name">
      </div>

      <div class="table-responsive">
        <table id="orderTable" class="table">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Customer</th>
              <th>Amount</th>
              <th>Status</th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#1001</td>
              <td>Sophia Bennett</td>
              <td>$55.00</td>
              <td><span class="status shipped">Shipped</span></td>
              <td class="actions"><a href="#">Details</a><a href="#">Update</a><a href="#">Refund</a></td>
            </tr>
            <tr>
              <td>#1002</td>
              <td>Ethan Carter</td>
              <td>$72.50</td>
              <td><span class="status processing">Processing</span></td>
              <td class="actions"><a href="#">Details</a><a href="#">Update</a><a href="#">Refund</a></td>
            </tr>
            <tr>
              <td>#1003</td>
              <td>Olivia Davis</td>
              <td>$38.75</td>
              <td><span class="status delivered">Delivered</span></td>
              <td class="actions"><a href="#">Details</a><a href="#">Update</a><a href="#">Refund</a></td>
            </tr>
            <tr>
    <td>#1004</td>
    <td>Liam Foster</td>
    <td>$95.20</td>
    <td><span class="status shipped">Shipped</span></td>
    <td class="actions"><a href="#">Details</a><a href="#">Update</a><a href="#">Refund</a></td>
  </tr>
  <tr>
    <td>#1005</td>
    <td>Ava Green</td>
    <td>$42.00</td>
    <td><span class="status processing">Processing</span></td>
    <td class="actions"><a href="#">Details</a><a href="#">Update</a><a href="#">Refund</a></td>
  </tr>
  <tr>
    <td>#1006</td>
    <td>Noah Hayes</td>
    <td>$68.90</td>
    <td><span class="status delivered">Delivered</span></td>
    <td class="actions"><a href="#">Details</a><a href="#">Update</a><a href="#">Refund</a></td>
  </tr>
  <tr>
    <td>#1007</td>
    <td>Isabella Ingram</td>
    <td>$29.50</td>
    <td><span class="status shipped">Shipped</span></td>
    <td class="actions"><a href="#">Details</a><a href="#">Update</a><a href="#">Refund</a></td>
  </tr>
  <tr>
    <td>#1008</td>
    <td>Jackson Jones</td>
    <td>$81.45</td>
    <td><span class="status processing">Processing</span></td>
    <td class="actions"><a href="#">Details</a><a href="#">Update</a><a href="#">Refund</a></td>
  </tr>
  <tr>
    <td>#1009</td>
    <td>Mia Knight</td>
    <td>$50.00</td>
    <td><span class="status delivered">Delivered</span></td>
    <td class="actions"><a href="#">Details</a><a href="#">Update</a><a href="#">Refund</a></td>
  </tr>
  <tr>
    <td>#1010</td>
    <td>Lucas Lewis</td>
    <td>$63.60</td>
    <td><span class="status shipped">Shipped</span></td>
    <td class="actions"><a href="#">Details</a><a href="#">Update</a><a href="#">Refund</a></td>
  </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>

      <!-- Footer -->
      <p>Showing 1 to 10 of 100 orders</p>

      <!-- Pagination -->
      <div class="pagination">
        <button class="btn btn-outline-secondary btn-sm">Previous</button>
        <button class="btn btn-outline-secondary btn-sm">Next</button>
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
      let rows = document.querySelectorAll('#orderTable tbody tr');
      
      rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
      });
    });
  </script>
</body>
</html>
