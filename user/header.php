<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Yash Agencies</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

  
    <link href="img/favicon.ico" rel="icon">

   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

   
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    $count=0;
    if(isset($_SESSION['cart']))
    {
        $count=count($_SESSION['cart']);
    }
    ?> 
        
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Yash</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Agency</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">+91 7678016874</h5>
        </div>
    </div>

    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        
                        <a href="toy.php" class="nav-item nav-link">Toys</a>
                        <a href="household.php" class="nav-item nav-link">Household</a>
                        <a href="hotel.php" class="nav-item nav-link">Hotel</a>
                        <a href="cleaning.php" class="nav-item nav-link">Cleaning Product</a>
                        <a href="gift.php" class="nav-item nav-link">Gifts</a>
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active"><i class="fas fa-home"></i> Home</a>
                            <a href="" class="nav-item nav-link">Hello,</a>
                            <?php
                            if(isset($_SESSION['user'])){
                                 echo '<span class="nav-item nav-link user-name">' . $_SESSION['user']['user_name'] . '</span>'; 
                                echo '<a href="logout.php" class="nav-item nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>';
                            } else {
                                echo '<a href="login.php" class="nav-item nav-link"><i class="fas fa-sign-in-alt"></i> Login</a>';
                            }
                            ?>
                            <a href="help.php" class="nav-item nav-link"><i class="fas fa-envelope"></i> Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <?php
                            if(isset($_SESSION['user'])) {
                                echo '<a href="mycart.php" class="btn px-0 ml-3">
                                        <i class="fas fa-shopping-cart text-primary"></i>
                                        <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">'.$count.'</span>
                                      </a>';
                           
                           
                                      echo '  <a href="profile.php" class="btn px-0 ml-3">
                                <i class="fas fa-user-circle text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 20px;"></span>
                            </a>';
                        }
                        ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <script src="js/main.js"></script>
