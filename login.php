<?php require_once './config/config.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>
    <div class="primary">Login</div>
    <br>
    <form action="" method="post">
        <label for="username">username : </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">password : </label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="login">
    </form>
    <br>

    <a href="./">home</a>
    <br>
    <a href="./login.php">login</a>
    <br>
    <a href="./register.php">register</a>
    <br>
    <a href="./forgot-password.php">forgot password</a>
    <br>
    <a href="./welcome.php">welcome</a>
</body>

</html>