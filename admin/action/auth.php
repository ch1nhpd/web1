<?php
    include(__DIR__ . '/../../action/connect.php');
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'u0') {
        header('HTTP/1.0 403 Forbidden');
        die('You are not allowed to access this function.');
    }
?>