<?php

declare(strict_types=1);

function is_input_empty($email, $password){
    if(empty($email) || empty($password)){
        return true;
    } else {
        return false;
    }
}

function is_email_wrong(bool|array $email) {

    if (!$email) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong(string $password, string $password2) {

    if ($password == $password2) {
        return false;
    } else {
        return true;
    }
}