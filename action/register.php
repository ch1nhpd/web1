<?php
include('./connect.php');
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $fullname = $_POST['fullname'];
    $role = 'u1';
    $query = "INSERT into `user` (username, password, fullname,role)
                     VALUES (?, ?, ?, ?)";
    
    try{
        $stmt = $con->prepare($query);
        $stmt->execute([$username,$password,$fullname,$role]);
        echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='../login.php'>Login</a></p>
                  </div>";
    } catch(PDOException $e) {
        echo "<div class='form'>
                  <h3>Failed!.</h3><br/>
                  <p class='link'>Click here to <a href='../register.php'>registration</a> again.</p>
                  </div>";
    }
} else {
}
?>