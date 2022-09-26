<?php
    include '../init.php';

    if (isset($_POST['signup'])) {
        $email = User::checkInput($_POST['email']);
        $password = User::checkInput($_POST['password']);
        $confirmpw = User::checkInput($_POST['confirmpw']);
        $username = User::checkInput($_POST['username']);

        // Remove spaces in username
        $username = str_replace(' ', '', $username);

        if (User::checkEmail($email)){
            $_SESSION['errors_signup'] = ['This email is already used'];
            header('location: ../../sign-up.php');
            return;
        }
        
        if (User::checkUserName($username)){
            $_SESSION['errors_signup'] = ['This username is already used'];
            header('location: ../../sign-up.php');
            return;
        }
        
        if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)){
            $_SESSION['errors_signup'] = ['Only Alphanumeric Characters and underscore is allowed for username'];
            header('location: ../../sign-up.php');
            return;
        } 

        if ($password !== $confirmpw) {
            $_SESSION['errors_signup'] = ['Passwords do not match'];
            header('location: ../../sign-up.php');
            return;
        }
        

        User::register($email, $password, $username);
    } else {
        header('location: ../../sign-up.php');
        return;
    }
?>