

<?php
require_once 'includes/config_session.php';
require_once 'includes/register_view.php';
require_once 'includes/login_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the Library</h1>
    <p><a href="includes/login_and_register.php">Login/Register</a> to borrow books.</p>/* 
    <form action="includes/logout.php" method="post">
        <button>Logout</button>
    </form>

    <h3><?php output_email(); ?></h3><!-- Not working properly, will fix -->

    <!-- Display a list of available books -->
    <?php
    // PHP code to fetch and display books from the database
    ?>

</body>
</html>
