<?php
 include"connection.php";
session_start();
if(isset($_SESSION['user'])){
$product_name = $_POST['pname'];
$product_price = $_POST['pprice'];
$product_quantity = $_POST['pquantity'];

 if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
     $_SESSION['cart'] = array(); 
 }


if (isset($_POST["addcart"])) {
    $check_product = array_column($_SESSION['cart'], 'Pname');
    if (in_array($product_name, $check_product)) {
        echo "
            <script> 
            alert('Product Already Added');
            window.location.href='index.php'; 
            </script>
        ";
    } else {
        $query = mysqli_query($con,"INSERT INTO `cart` (`uid`, `pname`, `pprice`, `pquantity`, `tprice`) 
        VALUES ('{$_SESSION['user']['user_id']}', '$product_name', '$product_price', '$product_quantity', '$product_price*$product_quantity')");
       $result = mysqli_query($con, "SELECT * FROM cart WHERE uid='{$_SESSION['user']['user_id']}' AND pname='$product_name'");
       if(mysqli_num_rows($result))
{
         $row = mysqli_fetch_assoc($result);
    
        $_SESSION['cart'][] = array(
            'cid'=>$row['c_id'],
            'Pname' => $row['pname'],
            'Pprice' => $row['pprice'],
            'Pquantity' => $row['pquantity'],
            'Ptotal' => $row['tprice']
        );
       
        header("location: mycart.php");
    }
    }
}

if (isset($_POST['remove'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['Pname'] === $_POST['item']) {
            unset($_SESSION['cart'][$key]);
            mysqli_query($con,"DELETE FROM cart WHERE c_id = '{$value['cid']}'");
            
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "<script>
                alert('Item Removed');
                window.location.href='mycart.php';
                </script>";
        }
    }
}

if (isset($_POST['update'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['Pname'] === $_POST['item']) {
            
            $_SESSION['cart'][$key]['Pquantity'] = $product_quantity;
            $_SESSION['cart'][$key]['Ptotal'] = $product_quantity * $value['Pprice'];

        
            mysqli_query($con, "UPDATE `cart` SET `pquantity`='$product_quantity', `tprice`='$product_quantity'*'{$value['Pprice']}' 
            WHERE c_id = '" . $value['cid'] . "'");
            
             
            
            
            header("location: mycart.php");
            exit(); 
        }
    }
}
}
else{
    
    header("location:form/login.php");
    
}

?>