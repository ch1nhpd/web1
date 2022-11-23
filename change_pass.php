<?php
include('./action/auth.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/login.css">
</head>

<body>

    <h2 style="text-align: center;">Change password</h2>

    <form action="./action/changeP.php" method="post">

        <div class="container">
            <label for="currentPass"><b>Current password</b></label>
            <input type="text" placeholder="Enter Current password" name="currentPass" required>

            <label for="newPassword"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="newPassword" required>

            <label for="newPassword2"><b>Retype Password</b></label>
            <input type="text" placeholder="Enter Password" name="newPassword2" required>

            <button type="submit">Change</button>
        </div>
    </form>

</body>

</html>