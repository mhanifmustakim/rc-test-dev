<?php
    include 'utils/init.php';
?>
<!-- -------------VIEW--------------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RC Cloud Practitioner Challenge</title>
</head>
<body>
    <form action="./utils/controls/login.php" method="POST">
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="submit" value="Log in" name="login">
    </form>

    <?php
        if(isset($_SESSION['errors'])){
            foreach ($_SESSION['errors'] as $error){
                echo '<h2>';
                echo $error;
                echo '</h2>';
            }

            unset($_SESSION['errors']);
        }
    ?>

    <a href="sign-up.php">Sign Up</a>
</body>
</html>