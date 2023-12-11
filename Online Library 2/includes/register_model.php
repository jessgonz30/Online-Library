<?php

declare(strict_types= 1);

function get_email(object $pdo,string $email){
    $query = "SELECT email FROM user WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $first_name, string $last_name, string $email, string $password){
    $query = "INSERT INTO user (first_name, last_name, email, password)
    VALUES (:first_name, :last_name, :email, :password);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("first_name", $first_name);
    $stmt->bindParam("last_name", $last_name);
    $stmt->bindParam("email", $email);
    $stmt->bindParam("password", $password);
    $stmt->execute();
}
