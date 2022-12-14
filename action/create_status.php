<?php
include('./connect.php');
include(__DIR__ . '/../util/csrf.php');
// include('./auth.php');
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['token'])) {
    is_valid_token('../home.php');
    $username = $_SESSION['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $con->prepare("SELECT id FROM user WHERE username=?");
    $stmt->execute([$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $id = $row['id'];
        $stmt = $con->prepare("INSERT into `status` (content, title, user_id)
        VALUES (?,?,?)");
        $stmt->execute([$content,$title,$id]);  
        echo "<script>
                alert('Success!');
                window.location.href='../home.php';
            </script>";
    } else {
        echo "<script>
                alert('ERROR!');
                window.location.href='../home.php';
            </script>";
    }

}else {
    echo "
        <script>
            alert('Token error!');
            window.location.href='../home.php';
        </script>";
}
unset($_SESSION['token']);
?>