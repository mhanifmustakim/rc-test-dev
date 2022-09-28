<?php
   include 'utils/init.php';
  
   $user_id = $_SESSION['user_id'];
   $user = User::getData($user_id);
   
   if (User::checkLogIn() === false) header('location: index.php');

   $post_id =  $_GET['id'];
   $post = Post::getData($post_id);
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezycle | <?php echo $post->header; ?></title>
    <script src="./utils/Assets/main-post.js" defer></script>
</head>
<body>
    <h1><?php echo $post->header; ?></h1>
    <h2><?php echo $post->content; ?></h2>
    <div id="comment-section"></div>
</body>
</html> 