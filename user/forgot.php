<?php 

$con=mysqli_connect("localhost:3307","root","","yash_agency");
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" >
  <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

  <title>ForgotPassword Form </title>
<style>
    
    .login-container {
     justify-content:center;
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      border:transparent;
      } 
    .login-container h2 {
      margin-bottom: 20px;
      text-align: center;
    }
    .login-container .form-group {
      margin-bottom: 20px;
      
    }
   
  </style>
</head>
<body>
<div class="login-container ">

      
        <font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 15px #000; color:red;"><center>Yash Agency</center></font>
    <br>
          <form method="POST" action="" >
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
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
if(isset($_POST['submit'])) {
    
    $username = $_POST['user_name'];
    $password = $_POST['password'];
    
    $query= "select * from users where (user_name='$username' OR email='$username')";  
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
     
        $update_query = "UPDATE users SET password = '$password' WHERE (user_name OR email='$username')";
        
        if(mysqli_query($con, $update_query)) {
            echo "
                <script>
                alert('Password Updated Successfully');
                window.location.href='login.php';
                </script>
            ";
        } else {
            echo "
                <script>
                alert('Failed to update password. Please try again.');
                window.location.href='forgot.php';
                </script>
            ";
        }
    } else {
        echo "
            <script>
            alert('Invalid User name');
            window.location.href='forgot.php';
            </script>
        ";
    }
}
?>
</body>
</html>

