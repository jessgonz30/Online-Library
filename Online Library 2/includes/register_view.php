<?php

declare (strict_types= 1); 

function check_register_errors() {
    if (isset($_SESSION['errors_register'])){
        $errors = $_SESSION['errors_register'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error .'<p>';
        }

        unset($_SESSION['errors_register']);
    } else if(isset($_GET["register"]) && $_GET["register"] === "success") {
        echo '<br>';
        echo '<p class = "form-success"> Signup success! Login below</p>';
    }

}