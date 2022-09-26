<?php
    include 'utils/init.php'
?>
<!-- --------VIEW--------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up for rc-test-server</title>
</head>
<body>  
    <form action="utils/controls/signup.php" method="POST">
        <input type="text" name="username" id="username" placeholder="username" maxlength="20" required>
        <input type="email" name="email" id="email" placeholder="email" required>
        <input type="password" name="password" id="password" placeholder="password" min-length="8" required>
        <input type="text" name="name" id="name" placeholder="name" maxlength="20" required>
        <input type="submit" value="Sign Up" name="signup">
    </form>

    <!-- Flash Errors for signup -->
    <?php 
        if(isset($_SESSION['errors_signup'])){
            foreach ($_SESSION['errors_signup'] as $error) {     
                echo '<h2>';
                echo $error;
                echo '<\h2>';
            }
        }

        unset($_SESSION['errors_signup']) 
    ?>
</body>
</html>