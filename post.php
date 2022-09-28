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
    <link rel="stylesheet" href="./utils/Assets/style-post.css">
    <script src="./utils/Assets/main-post.js" defer></script>
</head>
<body>
    <h1><?php echo $post->header; ?></h1>
    <h2><?php echo $post->content; ?></h2>
    <div id="comment-section"></div>
    <!-- Add Comment Form -->
    <hr>
    <button id="add-comment-btn" >
        Add Comment
    </button>
    <form data-postId=<?php echo $post_id; ?> id="post-comment-form" class="display-none" action="./utils/controls/comment.php" method="POST">
        <input type="text" name="comment" id="comment" maxlength="2047" required>
        <input type="hidden" name="post_id" id="post_id" value=<?php echo $post_id; ?>>
        <button id="cancel-comment-btn">Cancel</button>
        <input type="submit" value="Submit" name="submit">
    </form>
    <a href="home.php">Back</a>
</body>
</html> 