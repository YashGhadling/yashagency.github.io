<?php
    if (isset($_POST['update'])) {
       $id = $_POST['id'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $password = $_POST['password'];
      
        include "connection.php";
        mysqli_query($con, "UPDATE `users` SET `user_name`='$user_name', `email`='$email', `address`='$address', `number`='$number', `password`='$password' WHERE user_id='$id'");

        header("location:profile.php");
        exit;
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            color: #007bff;
        }
        hr {
            border-top: 2px solid #007bff;
        }
        .personal-info {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>User Profile</h1>
    <hr>
    <?php
    session_start();
    if(isset($_SESSION['user'])) {
      ?>
      <?php
        $id = $_GET['ID'];
        include "connection.php";
        $record = mysqli_query($con, "select * from users where user_id='$id'");
        $row = mysqli_fetch_array($record);
        ?>
       
       <div class="row">
            <div class="col-md-3">
              
            </div>
            <div class="col-md-9 personal-info">
                <h3>Update Personal info</h3>
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="user_name"
                                   value="<?php echo $row['user_name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Mobile Number</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="number" value="<?php echo $row['number'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="email" value="<?php echo $row['email'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="address" value="<?php echo $row['address'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Username:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="user_name" value="<?php echo $row['user_name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="password" value="<?php echo $row['password'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="hidden" name="id" value="<?php echo $row['user_id'] ?>">
                            <button type="submit" class="btn btn-primary btn-block mb-4" name="update">Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <hr>
        <?php
    } else {
        header("Location: form/login.php");
    }
    ?>
    
</body>
</html>
