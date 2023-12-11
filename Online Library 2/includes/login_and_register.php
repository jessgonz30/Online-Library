<?php
require_once 'config_session.php';
require_once 'register_view.php';
require_once 'login_view.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Register</h1>

    <!-- Registration form -->
    <form action="register_handler.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
        <br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <input type="submit" value="Register">
    </form>

    <?php
        check_register_errors();
    ?>

    <br>
    <h1>Login</h1>

    <!-- Login form -->
    <form action="login_handler.php" method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <input type="submit" value="Login">
    </form>

    <?php
        check_login_errors();
    ?>

</body>
</html>
