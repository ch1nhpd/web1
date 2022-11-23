<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./style/login.css">
</head>

<body>
    <h2 style="text-align: center;">Login</h2>
    <form action="./action/login.php" method="post">
        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit">Login</button>
            <p class="link"><a href="register.php">Click to Register</a></p>
        </div>
    </form>
</body>

</html>