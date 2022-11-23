<?php
    include('action/auth.php');
    include(__DIR__ . '/../action/connect.php');
    $id = $_GET['id'];
    $sql = "SELECT username, fullname from user where id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Update user</title>
    <link rel="stylesheet" href="../style/register.css" />
</head>

<body>

    <form class="form" action="action/update_user.php" method="post">
        <h1 class="login-title">User</h1>
        <input type="hidden" class="login-input" name="id" value="<?php echo $id ?>">
        <input type="text" class="login-input" name="fullname" placeholder="Fullname"
            value="<?php echo $row['fullname'] ?>">
        <input type="text" class="login-input" name="username" placeholder="Username"
            value="<?php echo $row['username'] ?>" required />
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Update" class="login-button">
    </form>
</body>

</html>