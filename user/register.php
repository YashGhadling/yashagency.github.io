<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background-color: #f3f4f6;
    }
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      font-family: Arial, sans-serif;
    }
    .login-container h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #333;
      font-size: 24px;
    }
    .login-container .form-group {
      margin-bottom: 20px;
      position: relative;
    }
    .login-container input[type="text"],
    .login-container input[type="email"],
    .login-container input[type="password"],
    .login-container input[type="date"] {
      width: calc(100% - 40px);
      padding: 10px;
      padding-left: 40px;
      border-radius: 5px;
      border: 1px solid #ccc;
      outline: none;
      transition: border-color 0.3s ease;
    }
    .login-container input[type="text"].fa-icon,
    .login-container input[type="email"].fa-icon,
    .login-container input[type="password"].fa-icon,
    .login-container input[type="date"].fa-icon {
      padding-left: 40px;
    }
    .login-container input[type="text"].fa-icon + .fa-input,
    .login-container input[type="email"].fa-icon + .fa-input,
    .login-container input[type="password"].fa-icon + .fa-input,
    .login-container input[type="date"].fa-icon + .fa-input {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
    }
    .login-container .btn-primary {
      width: 100%;
      padding: 12px;
      border-radius: 5px;
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
      border: none;
      outline: none;
      font-size: 16px;
    }
    .login-container .btn-primary:hover {
      background-color: #45a049;
    }
    .login-container .btn-secondary {
      width: 100%;
      padding: 12px;
      border-radius: 5px;
      background-color: #3498db;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
      border: none;
      outline: none;
      font-size: 16px;
      text-decoration: none;
      display: block;
      text-align: center;
    }
    .login-container .btn-secondary:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Sign Up</h2>
    <form action="sign_in.php" method="POST" enctype="multipart/form-data">
      <div class="form-group mb-3">
        <label for="name">User Name:</label>
        <div class="fa-input">
          <i class="fas fa-user"></i>
          <input type="text" name="user_name" placeholder="User Name" class="fa-icon">
        </div>
      </div>
      <div class="form-group mb-3">
        <label for="email">Email:</label>
        <div class="fa-input">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" placeholder="Enter Email" class="fa-icon">
        </div>
      </div>
      <div class="form-group mb-3">
        <label for="address">Address:</label>
        <div class="fa-input">
          <i class="fas fa-map-marker-alt"></i>
          <input type="text" name="address" placeholder="Enter Address" class="fa-icon">
        </div>
      </div>
      <div class="form-group mb-3">
        <label for="date">Date:</label>
        <div class="fa-input">
          <i class="fas fa-calendar"></i>
          <input type="date" name="date" class="fa-icon">
        </div>
      </div>
      <div class="form-group mb-3">
        <label for="number">Number:</label>
        <div class="fa-input">
          <i class="fas fa-phone"></i>
          <input type="text" name="number" placeholder="Enter Number" class="fa-icon">
        </div>
      </div>
      <div class="form-group mb-3">
        <label for="password">Password:</label>
        <div class="fa-input">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Enter password" class="fa-icon">
        </div>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn-primary" name="submit">Register</button>
      </div>
      <div class="mb-3">
        <a href="login.php" class="btn-secondary">Already Have Account</a>
      </div>
    </form>
  </div>
</body>
</html>
