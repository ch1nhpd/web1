<?php
include('auth.php');
include(__DIR__ . '/../../action/connect.php');
if (isset($_GET['id'])) {
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
}
?>