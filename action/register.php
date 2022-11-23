<?php
include('./connect.php');
if (isset($_POST['username'])) {
    // removes backslashes
    //$username = stripslashes($_POST['username']);
    //escapes special characters in a string
    //$username = mysqli_real_escape_string($con, $username);
    //$password = stripslashes($_POST['password']);
    //$password = mysqli_real_escape_string($con, $password);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $role = 'u1';
    $query = "INSERT into `user` (username, password, fullname,role)
                     VALUES ('$username', '" . md5($password) . "', '$fullname'" . ", '$role')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='../login.php'>Login</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
    }
} else {
}
?>