<?php
include('./connect.php');
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']); 

$sql = "select *from user where username = ? and password = ?";
$stmt = $con->prepare($sql);
$stmt->execute([$username,$password]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
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