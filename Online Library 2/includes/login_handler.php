<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once 'mysqli_connect.php';
        require_once 'login_model.php';
        require_once 'login_contr.php';
        
        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($email, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $email);

        if (is_email_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login!";
        }

        if (!is_email_wrong($result) && is_password_wrong($password, $result["password"])) {
            $errors["password_incorrect"] = "Incorrect password!";
        }

        require_once 'config_session.php';

        if ($errors){
            $_SESSION["errors_login"] = $errors;
            header("Location: login_and_register.php");
            die();
        }

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_email"] = htmlspecialchars($result["email"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: ../main_menu.php?login=success");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed". $e->getMessage());
    }
} else {
    header("Location: ../main_menu.php");
    die();
}
