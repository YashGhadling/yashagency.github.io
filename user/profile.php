<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        input[type="text"]:disabled,
        input[type="password"]:disabled {
            background-color: #e9ecef;
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
                include "connection.php"; 
                
                $id=$_SESSION['user']['user_id'];
                $record = mysqli_query($con, "SELECT * FROM users WHERE user_id='$id'");
                $row = mysqli_fetch_array($record);
        ?>

        <div class="row">
            <div class="col-md-3">
              
            </div>
            <div class="col-md-9 personal-info">
                <h3>Personal info</h3>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo $row['user_name']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo $row['email']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="address" value="<?php echo $row['address'] ?>"disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Mobile Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo $row['number']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Username:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="<?php echo $row['user_name']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" value="<?php echo $row['password']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                       
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">
                              <a href="editprofile.php?ID=<?php echo $row['user_id']; ?>" class="text-decoration-none text-white">Edit</a>
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
            header("Location: form\login.php");
        }
    ?>
</body>
</html>
