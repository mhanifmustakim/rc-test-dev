<?php
    include '../init.php';

    if (User::checkLogIn() === false) header('location: ../../index.php'); 

    $user_id = $_SESSION['user_id'];

    if (isset($_POST['commentId']) && isset($_POST['delete'])) {
        $comment_user_id = POST::getComments($_POST['commentId']) -> user_id;
        if ($user_id == $comment_user_id) {
            User::delete('comments', ['id' => $_POST['commentId']]);
        }
        $postId = POST::getComments($_POST['commentId'])->post_id;
        header('location: ../../post.php?id='.$postId);
    } else {
        header('location: ../../post.php?id='.$postId);
    }
?>