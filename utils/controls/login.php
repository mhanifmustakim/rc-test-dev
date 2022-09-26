<?php
    include '../init.php';

    if (isset($_POST['login']) && !empty($_POST['login'])) {
        $email= User::checkInput($_POST['email']);
        $password= User::checkInput($_POST['password']);
        
        User::login($email, $password);
        if (User::login($email, $password) === false) {
            $_SESSION['errors'] = ['Incorrect email or password.'];
            header('location: ../../index.php');
            return;
        }
    } else {
        header('location: ../../index.php');
        return;
    }
?>