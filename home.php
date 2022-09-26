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
</head>
<body>
    <h1>Welcome to Home Page! @<?php echo $user->username ?></h1>
</body>
</html>