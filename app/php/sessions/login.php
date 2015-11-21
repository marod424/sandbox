<?php

include 'config.php';
include 'functions.php';

session_start();

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    // get their values
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ( validate_user_creds($username, $password) ) {
        // login and set session
        $_SESSION['username'] = $username;
        header("Location: admin.php");
    } else {
        $status = "Incorrect login credentials.";
    }
}

// if ( isset($_POST['loginForm'])) {
//     echo 'posted';
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>
    <form action="login.php" method="post">
        <ul>
            <li>
                <label for="username">Username: </label>
                <input type="text" name="username">
            </li>

            <li>
                <label for="password">Password: </label>
                <input type="password" name="password">
            </li>

            <li>
                <input type="submit" value="Login" name="loginForm">
            </li>
        </ul>

        <?php if ( isset($status) ) : ?>
        <p><?= $status; ?><p>
        <?php endif ?>
    </form>
</body>
</html>