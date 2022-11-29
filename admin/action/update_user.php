<?php
include('auth.php');
include(__DIR__ . '/../../action/connect.php');
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $fullname = $_POST['fullname'];
    $id = $_POST['id'];
    $role = 'u1';
    $query = "UPDATE user
                    SET username = ?, fullname = ?, password = ?
                    WHERE id = ? ";
    try {
        $stmt = $con->prepare($query);
        $stmt->execute([$username,$fullname,$password,$id]);
        echo "
        <script>
            alert('Success!');
            window.location.href='../home.php';
        </script>";
        
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