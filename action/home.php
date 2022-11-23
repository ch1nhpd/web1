<?php
include('connect.php');
//session_start();
$username = $_SESSION['username'];

$sql = "select * from status where user_id = (select id from user where username = '$username') order by id desc";
$result = mysqli_query($con, $sql);

?>