<?php
include('./connect.php');
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $currentPass = md5($_POST['currentPass']);
    $password = md5($_POST['newPassword']);
    $result = mysqli_query($con, "SELECT password FROM user WHERE username='$username'");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($currentPass === $row['password']) {
        mysqli_query($con, "UPDATE user SET password = '$password'  where username = '$username';");
        echo "<script>
                alert('Success!');
                window.location.href='../home.php';
            </script>";
    } else {
        echo "<script>
                alert('Wrong password!');
                window.location.href='../home.php';
            </script>";
    }

}


?>