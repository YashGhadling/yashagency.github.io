<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title>Feedback Form</title>
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
  </style>
</head>
<body>
  <?php
  
  session_start();
  if(isset($_SESSION['user'])) {
    ?>
  

  <div class="login-container">
   
    <?php
include 'connection.php';


if(isset($_SESSION['user'])) {
    $id = $_SESSION['user']['user_id'];
    $record = mysqli_query($con, "SELECT * FROM users WHERE user_id= '$id'");


    $row = mysqli_fetch_array($record);
    ?>
    <font style="font:bold 44px 'Aleo'; text-shadow:1px 1px 15px #000; color:red;"><center>Feedback Form</center></font>
    <br>
    <form action="" method="POST">
      <div class="mb-3">
        <div class="input-group">
          <input type="text" class="form-control" name="feedbackName"  value="<?php echo $row['user_name']; ?>" disabled>
        </div>
      </div>
      <div class="mb-3">
        <div class="input-group">
          <input type="email" class="form-control" name="feedbackEmail" value="<?php echo $row['email']; ?>" disabled>
        </div>
      </div>
      <div class="mb-3">
        <div class="input-group">
          <textarea class="form-control" name="feedbackMessage" rows="5" placeholder="Enter your message" required></textarea>
        </div>
      </div>
      <button type="submit" name='submit' class="btn btn-primary">Submit</button>
    </form>
    <?php
    } else {
      header("Location: form/login.php");
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
include 'connection.php';

if(isset($_POST['submit'])) {
  $name = $_POST["feedbackName"];
  $email = $_POST["feedbackEmail"];
  $message = $_POST["feedbackMessage"];

  $sql = "INSERT INTO feedback (uid,  message) VALUES ('$id','$message')";

  if (mysqli_query($con, $sql)) {
      echo "<script>
      alert('Feedback submitted successfully');
      window.location.href='index.php';
      </script>";
  } else {
      echo "<script>
      alert('Please Try again.');
      window.location.href='feedback.php';
      </script>";
  }
}
}
 else {
header("Location: form/login.php");
}
mysqli_close($con);
?>
</body>
</html>
