<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SpiceCraft Admin Login</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: #fdfdfb;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    /* Card */
    .login-card {
      background: #fff;
      padding: 40px 35px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .login-card .logo {
      width: 60px;
      height: 60px;
      background: #f77f00;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      color: #fff;
      font-size: 24px;
    }

    .login-card h2 {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 8px;
      color: #222;
    }

    .login-card p {
      font-size: 14px;
      color: #777;
      margin-bottom: 25px;
    }

    /* Input Fields */
    .input-group {
      position: relative;
      margin-bottom: 18px;
      text-align: left;
    }

    .input-group label {
      font-size: 13px;
      font-weight: 600;
      color: #333;
      display: block;
      margin-bottom: 6px;
    }

    .input-group input {
      width: 100%;
      padding: 12px 40px 12px 40px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 14px;
      outline: none;
      transition: border 0.2s;
    }

    .input-group input:focus {
      border-color: #f77f00;
    }

    .input-group i {
      position: absolute;
      left: 12px;
      top: 36px;
      color: #c47c2d;
    }

    /* Remember Me + Forgot Password */
    .options {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 13px;
      margin-bottom: 20px;
    }

    .options label {
      display: flex;
      align-items: center;
      gap: 5px;
      cursor: pointer;
      color: #444;
    }

    .options a {
      text-decoration: none;
      color: #f77f00;
      font-weight: 500;
    }

    /* Button */
    .btn-login {
      width: 100%;
      background: #f77f00;
      color: #fff;
      border: none;
      padding: 12px;
      font-size: 15px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: background 0.3s;
    }

    .btn-login:hover {
      background: #e56f00;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="logo">
      <i class="fa-solid fa-caret-up"></i>
    </div>
    <h2>SpiceCraft Admin</h2>
    <p>Welcome back! Please log in to your account.</p>

    <form id="loginForm">
      <!-- Username -->
      <div class="input-group">
        <label for="username">Username or Email</label>
        <i class="fa-regular fa-user"></i>
        <input type="text" id="username" placeholder="Enter your username or email" required>
      </div>

      <!-- Password -->
      <div class="input-group">
        <label for="password">Password</label>
        <i class="fa-solid fa-lock"></i>
        <input type="password" id="password" placeholder="Enter your password" required>
      </div>

      <!-- Options -->
      <div class="options">
        <label><input type="checkbox" id="remember"> Remember me</label>
        <a href="#">Forgot password?</a>
      </div>

      <!-- Button -->
      <button type="submit" class="btn-login">Log In</button>
    </form>
  </div>

  <script>
    // Simple login validation (example only)
    document.getElementById("loginForm").addEventListener("submit", function(e) {
      e.preventDefault();
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;

      if(username === "admin" && password === "1234"){
        alert("Login successful ✅");
        // redirect to dashboard
        window.location.href = "dashboard.html";
      } else {
        alert("Invalid username or password ❌");
      }
    });
  </script>

</body>
</html>
