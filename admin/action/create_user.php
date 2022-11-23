<?php
include('auth.php');
include(__DIR__ . '/../../action/connect.php');
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $role = 'u1';
    $query = "INSERT into `user` (username, password, fullname,role)
                     VALUES ('$username', '" . md5($password) . "', '$fullname'" . ", '$role')";
    try {
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "
            <script>
                alert('Success!');
                window.location.href='../home.php';
            </script>";
        }
    } catch (Exception $e) {
        echo "
            <script>
                alert('Failed!');
                window.location.href='../home.php';
            </script>";
    }
} else {
}
?>