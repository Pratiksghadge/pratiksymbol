<?php 
//session start
session_start();
if(!isset($_SESSION['login']) || isset($_SESSION['login']) != true){
    header('Location: login.php');
    exit;
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body{
            background-image: url(img/dashboard.jpg);
            background-size: cover;
        }
    </style>
</head>

<body>
    <?php require 'nav.php' ?>
    <h1 style="margin-left: 5vw; color:white">Welcome - <?php echo $_SESSION['username']; ?></h1>
    <div>
    <h4 style="margin-left: 5vw; color:white">Only users with administrative privileges have the authority to view the signup also
        you have your own uasername and password to view<a href="login.php" style="color: yellowgreen;"> records.</a></h4>
    </div>
</body>

</html>