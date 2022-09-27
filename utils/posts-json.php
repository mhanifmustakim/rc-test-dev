<?php
    include 'init.php';
    $user_id = $_SESSION['user_id'];

    $return_value = array();
    $posts = POST::posts();
    foreach($posts as $post) { 
        $this_post = array();
        $this_post['own_by_user'] = $user_id === $post->user_id;
        $this_post['post_user'] = User::getData($post->user_id) ;
        $this_post['timeAgo'] = Post::getTimeAgo($post->post_on) ; 
        // $likes_count = Post::countLikes($post->id) ;
        // $user_like_it = Post::userLikeIt($user_id ,$post->id);
        $this_post['post_link'] = $post->id;
        $this_post['post'] = $post;
        // $comment_count = Post::countComments($post->id); 
        array_push($return_value, $this_post);
    }

    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($return_value);
?>