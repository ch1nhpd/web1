<?php
include('auth.php');
include(__DIR__ . '/../../action/connect.php');

if (isset($_GET['id']) && isset($_GET['token'])) {
    if($_GET['token']!=$_SESSION['token']){
        echo "
        <script>
            alert('Invalid CSRF token!');
            window.location.href='../home.php';
        </script>;
        ";
        exit;
    }
    $id = $_GET['id'];
    try {
        $con->beginTransaction();
        $stmt = $con->prepare("DELETE FROM `status` WHERE user_id = ?");
        $stmt->execute([$id]);
        $stmt = $con->prepare("DELETE FROM `user` WHERE id = ?;");
        $stmt->execute([$id]);
        $con->commit();
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
    echo "
        <script>
            alert('Token error!');
            window.location.href='../home.php';
        </script>";
}
unset($_SESSION['token']);
?>