<?php
include('./connect.php');
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

//prevent from mysqli injection  
//$username = stripcslashes($username);  
//$password = stripcslashes($password);  
//$username = mysqli_real_escape_string($con, $username);  
//$password = mysqli_real_escape_string($con, $password);  

$sql = "select *from user where username = '$username' and password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $row['role'];
    if ($row['role'] === 'u0') {
        echo "
                <script>
                    alert('Success!');
                    window.location.href='../admin/home.php';
                </script>";
    } else {
        echo "
                <script>
                    alert('Success!');
                    window.location.href='../home.php';
                </script>";
    }

} else {
    echo "
            <script>
                alert('Login failed!');
                window.location.href='../login.php';
            </script>";
}
?>