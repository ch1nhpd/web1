<?php
include('auth.php');
include(__DIR__ . '/../../action/connect.php');
include(__DIR__ . '/../../util/validate.php');
include(__DIR__ . '/../../util/csrf.php');
if (isset($_POST['username']) && isset($_SESSION['token'])) {
    is_valid_token('../home.php');
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $id = $_POST['id'];
    $role = 'u1';
    if($_POST['password']!=''){
        if (!valid_password($_POST['password'])){
            echo "
            <script>
                alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.!');
                window.location.href='../home.php';
            </script>;
            ";
            exit;
        }
        
        $password = md5($_POST['password']);
        $query = "UPDATE user
                    SET username = ?, fullname = ?, password = ?
                    WHERE id = ? ";
        $value = [$username,$fullname,$password,$id];
    }else{
        //update without pass
        $query = "UPDATE user
                    SET username = ?, fullname = ?
                    WHERE id = ? ";
        $value = [$username,$fullname,$id];
    }
    
    try {
        $stmt = $con->prepare($query);
        $stmt->execute($value);
        echo "
        <script>
            alert('Success!');
            window.location.href='../home.php';
        </script>";
        
    } catch (Exception $e) {
        echo "
            <script>
                alert('Failed!');
                window.location.href='../home.php';
            </script>";
    }

} else {
    echo "
        <script>
            alert('Token error!');
            window.location.href='../home.php';
        </script>";
}
unset($_SESSION['token']);
?>