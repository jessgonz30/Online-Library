<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once 'mysqli_connect.php';
        require_once 'register_model.php';
        require_once 'register_contr.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($first_name, $last_name, $email, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email!";
        }

        if (is_email_taken($pdo, $email)) {
            $errors["email_taken"] = "Email already registered!";
        }

        require_once 'config_session.php';

        if ($errors){
            $_SESSION["errors_register"] = $errors;
            header("Location: login_and_register.php");
            die();
        }

        create_user($pdo, $first_name, $last_name, $email, $password);

        header("Location: login_and_register.php?register=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: login_and_register.php");
    die();
}

/*try {
    require_once("mysqli_connect.php");

    $query = "INSERT INTO user (first_name, last_name, email, password) 
    VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($query);

    $stmt->execute([$first_name, $last_name, $email, $password]);

    $pdo = null;
    $stmt = null;

    header("Location: main_menu.php");

    die();
} catch (PDOException $e) {
    die("Query failed". $e->getMessage());
}*/