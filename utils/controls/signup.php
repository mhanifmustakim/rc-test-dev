<?php
    include '../init.php';

    if (isset($_POST['signup'])) {
        $email = User::checkInput($_POST['email']);
        $password = User::checkInput($_POST['password']);
        $username = User::checkInput($_POST['username']);
        $name = User::checkInput($_POST['name']);

        // Remove spaces in username
        $username = str_replace(' ', '', $username);

        if (User::checkEmail($email)){
            $_SESSION['errors_signup'] = ['This email is already used'];
            header('location: ../../index.php');
            return;
        }
        
        if (User::checkUserName($username)){
            $_SESSION['errors_signup'] = ['This username is already used'];
            header('location: ../../index.php');
            return;
        }
        
        if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)){
            $_SESSION['errors_signup'] = ['Only Alphanumeric Characters and underscore is allowed for username'];
            header('location: ../../index.php');
            return;
        } 

        User::register($email, $password, $name, $username);
    } else {
        header('location: ../../index.php');
        return;
    }
?>