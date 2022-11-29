<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="./style/register.css" />
</head>

<body>

    <form class="form" action="./action/register.php" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="fullname" placeholder="Fullname">
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="text" class="login-input" name="captcha" placeholder="Input captcha"><img src="util/captcha.php" title="" alt="" /><br />
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login </a></p>
    </form>
</body>

</html>