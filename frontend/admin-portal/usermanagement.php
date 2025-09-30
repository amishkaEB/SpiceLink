<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SpiceCraft - User Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #fafafa;
      color: #333;
    }

    /* Top Navbar */
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #fff;
      padding: 15px 30px;
      border-bottom: 1px solid #ddd;
      position: relative;
    }

    .navbar-left {
      display: flex;
      align-items: center;
      gap: 40px;
    }

    .logo {
      font-weight: bold;
      font-size: 20px;
      color: #f77f00;
    }

    .nav-links {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 25px;
    }

    .nav-links a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
    }

    .nav-links a.active {
      color: #f77f00;
      border-bottom: 2px solid #f77f00;
      padding-bottom: 4px;
    }

    .navbar-right {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .navbar-right i {
      font-size: 18px;
      cursor: pointer;
    }

    .navbar-right img {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      cursor: pointer;
    }

    /* Page */
    .container {
      max-width: 1200px;
      margin: 30px auto;
      padding: 0 20px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .header h1 {
      font-size: 24px;
    }

    .btn-add {
      background: #f77f00;
      color: #fff;
      border: none;
      padding: 10px 16px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
      font-weight: 500;
    }

    .btn-add:hover {
      background: #e56f00;
    }

    /* Filters */
    .filters {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-bottom: 20px;
    }

    .filters input,
    .filters select {
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      flex: 1;
      min-width: 180px;
    }

    /* Table */
    .table-container {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      border: 1px solid #eee;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 14px 16px;
      text-align: left;
      border-bottom: 1px solid #f0f0f0;
    }

    th {
      background: #fafafa;
      font-weight: bold;
      font-size: 14px;
    }

    td {
      font-size: 14px;
    }

    /* Badges */
    .badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 500;
      display: inline-block;
    }

    .admin { background: #e7f0ff; color: #3366cc; }
    .sales { background: #fff4cc; color: #b38f00; }

    .active { background: #d9f7d9; color: #228b22; }
    .inactive { background: #ffd6d6; color: #cc0000; }

    /* Actions */
    .actions {
      display: flex;
      gap: 12px;
    }

    .actions i {
      cursor: pointer;
      font-size: 14px;
    }

    .fa-pen { color: #1976d2; }
    .fa-trash { color: #c62828; }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-left">
      <div class="logo">SpiceCraft</div>
      <div class="nav-links">
        <a href="#">Dashboard</a>
        <a href="#">Orders</a>
        <a href="#">Products</a>
        <a href="#">Customers</a>
        <a href="#">Discounts</a>
        <a href="#" class="active">Staff</a>
      </div>
    </div>
    <div class="navbar-right">
      <i class="fa-regular fa-bell"></i>
      <img src="https://i.pravatar.cc/150?img=47" alt="User Profile">
    </div>
  </div>

  <!-- Main -->
  <div class="container">
    <div class="header">
      <h1>User Management</h1>
      <button class="btn-add"><i class="fa-solid fa-plus"></i> Add Staff</button>
    </div>

    <!-- Filters -->
    <div class="filters">
      <input type="text" id="search" placeholder="Search staff by name or email...">
      <select id="roleFilter">
        <option value="">Filter by Role</option>
        <option value="Admin">Admin</option>
        <option value="Sales">Sales</option>
      </select>
      <select id="statusFilter">
        <option value="">Filter by Status</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select>
    </div>

    <!-- Table -->
    <div class="table-container">
      <table id="staffTable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Sophia Bennett</td>
            <td>sophia.bennett@example.com</td>
            <td><span class="badge admin">Admin</span></td>
            <td><span class="badge active">Active</span></td>
            <td class="actions">
              <i class="fa-solid fa-pen"></i>
              <i class="fa-solid fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td>Ethan Carter</td>
            <td>ethan.carter@example.com</td>
            <td><span class="badge sales">Sales</span></td>
            <td><span class="badge active">Active</span></td>
            <td class="actions">
              <i class="fa-solid fa-pen"></i>
              <i class="fa-solid fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td>Olivia Davis</td>
            <td>olivia.davis@example.com</td>
            <td><span class="badge sales">Sales</span></td>
            <td><span class="badge inactive">Inactive</span></td>
            <td class="actions">
              <i class="fa-solid fa-pen"></i>
              <i class="fa-solid fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td>Liam Foster</td>
            <td>liam.foster@example.com</td>
            <td><span class="badge admin">Admin</span></td>
            <td><span class="badge active">Active</span></td>
            <td class="actions">
              <i class="fa-solid fa-pen"></i>
              <i class="fa-solid fa-trash"></i>
            </td>
          </tr>
          <tr>
            <td>Ava Green</td>
            <td>ava.green@example.com</td>
            <td><span class="badge sales">Sales</span></td>
            <td><span class="badge active">Active</span></td>
            <td class="actions">
              <i class="fa-solid fa-pen"></i>
              <i class="fa-solid fa-trash"></i>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    // Simple filter logic
    const searchInput = document.getElementById('search');
    const roleFilter = document.getElementById('roleFilter');
    const statusFilter = document.getElementById('statusFilter');
    const table = document.querySelector('#staffTable tbody');

    function filterTable() {
      const searchText = searchInput.value.toLowerCase();
      const role = roleFilter.value;
      const status = statusFilter.value;

      Array.from(table.rows).forEach(row => {
        const name = row.cells[0].textContent.toLowerCase();
        const email = row.cells[1].textContent.toLowerCase();
        const roleText = row.cells[2].textContent;
        const statusText = row.cells[3].textContent;

        const matchSearch = name.includes(searchText) || email.includes(searchText);
        const matchRole = !role || roleText.includes(role);
        const matchStatus = !status || statusText.includes(status);

        row.style.display = (matchSearch && matchRole && matchStatus) ? '' : 'none';
      });
    }

    searchInput.addEventListener('input', filterTable);
    roleFilter.addEventListener('change', filterTable);
    statusFilter.addEventListener('change', filterTable);
  </script>
</body>
</html>
