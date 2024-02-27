<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body{
            background-image: url(img/login.jpg);
            background-size: cover;
        }
    </style>
</head>
<body>
<?php require 'nav.php' ?>
<h4 style="margin-left: 5vw;"><h4 style="margin-left: 5vw;">Thank you for visiting our website! Your presence is appreciated, and we hope you find your experience here valuable and enjoyable.</h4>
<?php
session_start();
if(!isset($_SESSION['login']) || isset($_SESSION['login']) != true){
    header('Location: login.php');
    exit;
} 

session_unset();
session_destroy();

    echo '<script>
            setTimeout(() => {
                window.location.href = "login.php";
            }, 3000);
        </script>';
exit;
?>
</body>
</html>