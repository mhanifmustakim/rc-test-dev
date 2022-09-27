<?php
    include 'utils/init.php';

    if (User::checkLogIn() === false) {
        header('location: index.php');
        return;
    }

    $user_id = $_SESSION['user_id'];
    $user = User::getData($user_id);
?>
<!-- ----------VIEW--------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="./utils/Assets/main-home.js" defer></script>
</head>
<body>
    <h1>Welcome to Home Page! @<?php echo $user->username ?></h1>

    <div id="post-container"></div>
    
    <h1>Start a new discussion: </h1>
    <form action="./utils/controls/post.php" method="POST">
        <input type="text" name="header" id="header" placeholder="Add header of discussion." maxlength="127" required>
        <input type="text" name="content" id="content" placeholder="Add description." maxlength="2047" rows="5" cols="50" required>
        <input type="submit" value="Start Discussion" name="post">
    </form>
    <a href="utils/controls/logout.php">Log Out</a>
</body>
</html>