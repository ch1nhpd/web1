<?php
include('./connect.php');
include(__DIR__ . '/../util/validate.php');
session_start();
if (isset($_SESSION['username'])) {
    if (!valid_password($_POST['newPassword'])){
        echo "
        <script>
            alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.!');
            window.location.href='../home.php';
        </script>;
        ";
        exit;
    }
    $username = $_SESSION['username'];
    $currentPass = md5($_POST['currentPass']);
    $password = md5($_POST['newPassword']);
    $stmt = $con->prepare("SELECT password FROM user WHERE username=?");
    $stmt->execute([$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($currentPass === $row['password']) {
        $stmt = $con->prepare("UPDATE user SET password = ?  where username = ?;");
        $stmt->execute([$password,$username]);
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