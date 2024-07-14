<?php require_once './config/config.php' ?>
<?php

$username = $password = $confirmPassword = "";
$usernameErr = $passwordErr = $confirmPasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty((trim($_POST["username"])))) {
        $usernameErr = "username is required";
        echo "<div class='error'>$usernameErr</div>";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $_POST["username"]);
        $stmt->execute();
        $result = $stmt->get_result();        
        // print_r($result->fetch_assoc());
        if ($result->num_rows > 0) {
            $usernameErr = "username already exists";
            echo "<div class='error'>$usernameErr</div>";
        } else {
            $username = trim($_POST["username"]);
        }
    }





    if (empty(trim($_POST["password"]))) {
        $passwordErr = "password is required";
        echo "<div class='error'>$passwordErr</div>";
    } elseif (strlen(trim($_POST["password"])) < 0) {
        $passwordErr = "password must be at least 6 characters";
        echo "<div class='error'>$passwordErr</div>";
    } else {
        $password = trim($_POST["password"]);
    }






    if (empty(trim($_POST["confirm-password"]))) {
        $confirmPasswordErr = "confirm password is required";
        echo "<div class='error'>$confirmPasswordErr</div>";
    } else {
        $confirmPassword = trim($_POST["confirm-password"]);

        if ($password != $confirmPassword) {
            $confirmPasswordErr = "password does not match";
            echo "<div class='error'>$confirmPasswordErr</div>";
        }
    }





    if (empty($usernameErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("location: ./login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>
    <br>
    <div class="primary">Registeration</div>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">username : </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">password : </label>
        <input type="password" name="password" id="password">
        <br>
        <label for="confirm-password">confirm password : </label>
        <input type="password" name="confirm-password" id="confirm-password">
        <br>
        <input type="submit" value="register">
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