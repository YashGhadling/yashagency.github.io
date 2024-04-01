<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title>Login Form</title>
  <style>
    .login-container {
      justify-content: center;
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      border: transparent;
    } 
    .login-container h2 {
      margin-bottom: 20px;
      text-align: center;
    }
    .login-container .form-group {
      margin-bottom: 20px;
    }
    .login-container:before {
      background-image: url("https://img.freepik.com/free-photo/arrangement-black-friday-shopping-carts-with-copy-space_23-2148667047.jpg?size=626&ext=jpg&ga=GA1.1.1412446893.1704844800&semt=ais");
      width: 100%;
      height: 100%;
      background-size: cover;
      content: "";
      position: fixed;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      z-index: -1;
      display: block;
      filter: blur(2px);
    }
  </style>
</head>
<body>
  <div class="login-container">
    <font style="font:bold 44px 'Aleo'; text-shadow:1px 1px 15px #000; color:red;"><center>Yash Agency</center></font>
    <br>
    <form action="login1.php" method="POST">
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="user_name" placeholder="Username" required>
        </div>
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
      </div>
       
  <button type="submit" class="btn btn-primary btn-block mb-4 w-100 "name="submit ">Login</button>
      <div class="row mb-4">
      <div class="col">  
      <div class="col text-end">  
      <a href="forgot.php">Forgot password?</a>
    </div>
  </div>
  </div> 
  <div class="text-center">
    <p>Not a member? <a href="register.php">Register</a></p>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
