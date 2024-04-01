
<?php
$con = mysqli_connect("localhost:3307", "root", "", "yash_agency");

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    if (empty($user_name) || empty($email)  || empty($address) || empty($date)|| empty($number) || empty($password)) {
        echo "
        <script>
        alert('All fields are required.');
        window.location.href = 'register.php';
        </script>";
    } else {
        function validatePhoneNumber($phoneNumber)
        {
            $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
            if (preg_match('/^(?:\+91|0)?[6789]\d{9}$/', $phoneNumber)) {
                return true;
            } else {
                return false;
            }
        }

        if (!validatePhoneNumber($number)) {
            echo "
            <script>
            alert('Invalid phone number.');
            </script>";
        } else {
            $dup_email = mysqli_query($con, "select * from users where email='$email'");
            if (mysqli_num_rows($dup_email)) {
                echo "
                <script>
                alert('Email is already taken');
                </script>";
            } else {
                $dup_name = mysqli_query($con, "select * from users where user_name='$user_name'");
                if (mysqli_num_rows($dup_name)) {
                    echo "
                    <script>
                    alert('Name is already taken');
                    </script>";
                } else {
                    mysqli_query($con, "insert into users (user_name,email,address,date,number,password) values ('$user_name','$email','$address','$date','$number','$password')");
                    echo "
                    <script>
                    alert('Successfully registered');
                    window.location.href = 'login.php';
                    </script>";
                }
            }
        }
    }
}
?>