<?php
include('./connect.php');
// include('./auth.php');
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $result = mysqli_query($con, "SELECT id FROM user WHERE username='$username'");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (count($row) == 1) {
        $id = $row['id'];
        $query = "INSERT into `status` (content, title, user_id)
                     VALUES ('$content'" . ", '$title'" . ", $id)";

        mysqli_query($con, $query);
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

}
?>