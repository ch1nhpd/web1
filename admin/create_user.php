<?php
include('action/auth.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Create user</title>
    <link rel="stylesheet" href="../style/register.css" />
</head>

<body>

    <form class="form" action="action/create_user.php" method="post">
        <h1 class="login-title">User</h1>
        <input type="text" class="login-input" name="fullname" placeholder="Fullname">
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Create" class="login-button">
    </form>
</body>

</html>