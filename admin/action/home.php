<?php
include('auth.php');
include(__DIR__ . '/../../action/connect.php');
$username = $_SESSION['username'];
$role = $_SESSION['role'];

$sql = "select id,username,fullname from user where role <> '$role'";
$result = mysqli_query($con, $sql);

?>