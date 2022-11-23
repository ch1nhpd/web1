<?php
include('auth.php');
include(__DIR__ . '/../../action/connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM status WHERE user_id = $id;";
    $query .= "DELETE FROM user WHERE id = $id;";
    try {
        $result = mysqli_multi_query($con, $query);
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