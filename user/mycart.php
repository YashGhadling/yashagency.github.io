<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
</head>
<body> 
<?php
include "header.php";
?>
    <div class="container"> 
      <div class="row">
        <div class="col-lg-12 text-center border rounded bg-light my-5">
          <h1 class='text-danger'> My Cart </h1>
        </div>
        <div class="col-lg-9">
          <form action ='manage_cart.php' method='POST'>
           <table class="table table-bordered">
            <thead class="text-center">
                <tr>
          <th scope="col">Serial No.</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product price</th>
          <th scope="col">Product Quantity</th>
          <th scope="col">Total Price</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
                </tr>
            </thead>
           <tbody class="text-center">
            <?php
              $total = 0;
              $totals = 0;
              if (isset($_SESSION['cart'])) {
             foreach ($_SESSION['cart'] as $key => $value) {
             $sr = $key + 1;
            $total = (float)$value['Pprice'] * (int)$value['Pquantity'];
            $totals += (float)$value['Pprice'] * (int)$value['Pquantity'];
            echo "
            <tr>
            <td>$sr</td>
            <td><input type='hidden' name='pname' value='$value[Pname]'>$value[Pname]</td>
            <td><input type='hidden' name='pprice' value='$value[Pprice]'>$value[Pprice]</td>
            <td><input type='text' name='pquantity' value='$value[Pquantity]'></td>
            <td> $total</td>
            <td><button name='update' class='btn btn-small btn-outline-warning'>Update</button></td>
            <td><button name='remove' class='btn btn-small btn-outline-danger'>REMOVE</button></td>
            <td><input type='hidden' name='item' value='$value[Pname]'></td>
               </tr>";
                    }
                 }
             ?>
              </tbody>
              </table>
             </form>
            </div>
            <div class="col-lg-3">
                <div class="border bg-light rounded p-4">
                    <h4>Total:</h4>
                    <h5 class="text-right"><?php echo $totals ?></h5>
                    <br>
                    <form>
                      
    <button class="btn btn-primary btn-block"><a href="shipping.php" class="text-decoration-none text-white">Buy Now</a></button>
</form> 
</div>
</div>
</div>
</div>
</body>
</html>