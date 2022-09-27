<?php
    include '../init.php';

    if (User::checkLogIn() === false) header('location: ../../index.php'); 

    $user_id = $_SESSION['user_id'];

    if (isset($_POST['postId']) && isset($_POST['delete'])) {
        $post_user_id = POST::getData($_POST['postId']) -> user_id;
        if ($user_id == $post_user_id) {
            User::delete('posts', ['id' => $_POST['postId']]);
        }
        header('location: ../../home.php');
    } else {
        header('location: ../../index.php');
    }
?>