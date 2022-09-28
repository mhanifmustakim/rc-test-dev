<?php
    include 'init.php';
    $user_id = $_SESSION['user_id'];

    $return_value = array();
    if (!isset($_GET['id'])) return;
    $comments = POST::comments($_GET['id']);
    foreach($comments as $comment) { 
        $comment_user = User::getData($comment->user_id);
        $this_comment = array();
        $this_comment['own_by_user'] = $user_id === $comment->user_id;
        $this_comment['comment_username'] = $comment_user->username;
        $this_comment['timeAgo'] = Post::getTimeAgo($comment->time); 
        // $likes_count = Post::countLikes($post->id) ;
        // $user_like_it = Post::userLikeIt($user_id ,$post->id);
        $this_comment['comment_id'] = $comment->id;
        $this_comment['comment_content'] = $comment->comment;
        // $comment_count = Post::countComments($post->id); 
        array_push($return_value, $this_comment);
    }

    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($return_value);
?>