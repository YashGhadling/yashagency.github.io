<?php
session_start();
if(isset($_SESSION['user'])) {
    include "connection.php"; 
    $id = $_SESSION['user']['user_id'];
    $grandTotal = 0;
    
  
    mysqli_query($con, "DELETE FROM bill WHERE uid='$id'");
    
    $res = mysqli_query($con, "SELECT * FROM cart where uid='$id'");
    while ($rows = mysqli_fetch_assoc($res)) {
        $total = (float)$rows['pprice'] * (int)$rows['pquantity'];
        $grandTotal += $total; 
        
        $check_query = "SELECT * FROM bill WHERE uid='$id' AND pname='".$rows['pname']."'";
        $check_result = mysqli_query($con, $check_query);
        if(mysqli_num_rows($check_result) == 0) {
            mysqli_query($con, "INSERT INTO bill (uid, pname, pquantity, pprice, tprice) VALUES ('$id', '".$rows['pname']."', '".$rows['pquantity']."', '".$rows['pprice']."', '".$total."')");
        }
    }

    mysqli_query($con, "INSERT INTO orderss (uid, total_amount) VALUES ('$id', '$grandTotal')");

    $res = mysqli_query($con, "SELECT * FROM bill WHERE uid='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .total {
            font-weight: bold;
        }
        .btn {
            padding: 8px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
    </style>
</head>
<body>
    <?php
    $id = $_SESSION['user']['user_id'];
    $record = mysqli_query($con, "SELECT * FROM users WHERE user_id='$id'");
    $row = mysqli_fetch_array($record);
    ?>
    <div class="container">
        <h1>Billing Invoice</h1>
        <p><strong>Date:</strong> <?php echo date("d-m-Y"); ?></p>
        <p><strong>Customer Name:</strong><?php echo $row['user_name']; ?></p>
        <p><strong>Shipping Address:</strong><?php echo $row['address'] ?></p>
        
        <div class="container"> 
            <div class="row">
                <div >
                    <h1 class='text-danger'> Order Details </h1>
                </div>
                <div >
                    <table >
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "
                                <tr>
                                    <td>".$row['pname']."</td>
                                    <td>".$row['pprice']."</td>
                                    <td>".$row['pquantity']."</td>
                                    <td>".$row['tprice']."</td>
                                </tr>";
                            }
                            ?>
                            <tr>
                                <td colspan="3" class="total">Total:</td>
                                <td class="total"><?php echo $grandTotal;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
        <button class="btn btn-primary" id="print" onclick="printPage();">Print</button>
        <button class="btn btn-secondary"><a href="payment.php" style="color: white; text-decoration: none;">Proceed To Pay</a></button>
    </div>

    <script>
        function printPage() {
            window.print();
        }
    </script> 

</body>
</html>
<?php
} else {
    header("Location: form/login.php");
    exit;
}
?>