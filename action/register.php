<?php
include('./connect.php');
include(__DIR__ . '/../util/validate.php');
session_start();
if (isset($_POST['username']) && $_POST['captcha'] && $_POST['captcha']===$_SESSION['captcha']) {
    if (!valid_password($_POST['password'])){
        echo "
        <script>
            alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.!');
            window.location.href='../register.php';
        </script>;
        ";
        exit;
    }
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
    echo "
        <script>
            alert('Captcha error!!');
            window.location.href='../register.php';
        </script>;
        ";
        exit;
}
unset($_SESSION['captcha']);
?>