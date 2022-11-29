<?php
include('auth.php');
include(__DIR__ . '/../../action/connect.php');
include(__DIR__ . '/../../util/validate.php');
if (isset($_POST['username'])) {
    if (!valid_password($_POST['password'])){
        echo "
        <script>
            alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.!');
            window.location.href='../create_user.php';
        </script>;
        ";
        exit;
    }
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $fullname = $_POST['fullname'];
    $role = 'u1';
    $query = "INSERT into `user` (username, password, fullname,role)
                     VALUES (?, ?, ?, ?)";
    try {
        $stmt = $con->prepare($query);
        $stmt->execute([$username,$password,$fullname,$role]);
        echo "
        <script>
            alert('Success!');
            window.location.href='../home.php';
        </script>";
    } catch (PDOException $e) {
        echo "
            <script>
                alert('Failed!');
                window.location.href='../home.php';
            </script>";
    }
} else {
}
?>