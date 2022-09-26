<?php
    include 'Classes/Connect.php';
    include 'Classes/User.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }    

    global $pdo;

    // define("BASE_URL", "http://localhost/rc-test-server");
?>