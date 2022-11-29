<?php
include('connect.php');
//session_start();
$username = $_SESSION['username'];

$sql = "select * from status where user_id = (select id from user where username = ?) order by id desc";
$stmt = $con->prepare($sql);
$stmt->execute([$username]);

?>