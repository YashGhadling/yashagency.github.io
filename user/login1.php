<?php
$name=$_POST['user_name'];
$password=$_POST['password'];


$con=mysqli_connect("localhost:3307","root","","yash_agency");

$result=mysqli_query($con,"select * from users where (user_name='$name' OR email='$name') AND password='$password'");
 session_start();
if(mysqli_num_rows($result))
{
    $user_row = mysqli_fetch_assoc($result);
    
    $_SESSION['user'] = array(
        'user_name' =>$user_row['user_name'],
        'user_id' =>  $user_row['user_id']
       );
    
	echo"
	<script>
	alert('Successfully login');
	window.location.href='index.php';
	</script>
	";
}
else{
    {
        echo"
        <script>
        alert('Invalid Name or Password');
        window.location.href='login.php';
        </script>
        ";
    }
}
$resultcart = mysqli_query($con, "SELECT * FROM cart WHERE uid='{$user_row['user_id']}'");
if(mysqli_num_rows($resultcart) > 0) {
  
    $_SESSION['cart'] = array();

   
    while($row = mysqli_fetch_assoc($resultcart)) {
        $_SESSION['cart'][] = array(
            'cid' => $row['c_id'],
            'Pname' => $row['pname'],
            'Pprice' => $row['pprice'],
            'Pquantity' => $row['pquantity'],
            'Ptotal' => $row['tprice']
        );
        
    }
}
?>