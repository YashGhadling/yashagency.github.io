<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HouseholdProduct Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" >
	<link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
      
<style>

  .card-img-top:hover {
  opacity: 0.8;
}
 .img-container {
            position: relative;
            overflow: hidden;
        }

        .img-container img {
            transition: transform 0.3s ease-in-out;
        }

        .img-container:hover img {
            transform: scale(1.1);
        }

.bg{
  background-color: grey;
}

.bgg{
  background-color: darkgrey;
}

  </style>
  
  <?php
include "header.php";
?>
</head>
<body>
<div class="container-fluid">
<div class="col-md-12">
<div class="row">
<h1 class="text-warning text-center my-3">HouseholdProduct</h1>
<?php
include "connection.php";
$record = mysqli_query($con,"select * from product_list where pcatogery='Household'");
while($row=mysqli_fetch_array($record))
{
echo "

<div class='col-md-6 col-lg-4 m-auto'>
<form method='POST' action='manage_cart.php'>
<div class='card m-auto card border-0' style='width: 18rem;'>
  <img src='../admin/product/$row[pimage]' class='card-img-top' >
  <div class='card-body'>
    <h5 class='card-title text-center text-danger fs-4 fw-bold'>$row[pname]</h5>
    <h5 class='card-body text-center text-danger fs-4 fw-bold'>$row[pdescription]</h5>
    <h5 class='card-body text-center text-danger fs-4 fw-bold'>RS.$row[pprice]</h5>
    <div class='text-center'>
    <input type='hidden' name='pname' value='$row[pname]'>
    <input type='hidden' name='pprice' value='$row[pprice]'>
    <input type='number'  name='pquantity' class='text-center' value='min='1' max='20'' placeholder='Quantity'>
    </div>
    <br>
    
    <input type='submit'class='btn btn-warning test-white w-100' name='addcart' value='Add To Cart'> 
</div>
</div>
</form>
</div>
";
}

?>
 </div>
</div>
</div>
<?php
include "footer.php";
?>
</body>
</html>