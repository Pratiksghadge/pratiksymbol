<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            background-image: url(img/login.jpg);
            background-size: cover;
            background-position: center;
        }

        .main {
            text-align: -webkit-center;
            height: 100vh;
        }

        .pass {
            margin-top: 13vh;
            text-align: -webkit-center;
            display: inline-block;
            padding: 2vw;
            box-shadow: inset 4vw 3vw 9vw 5vw white;
            border-radius: 2vw;
        }

        .pass h1 {
            margin-top: 0px;
            display: inline-block;
            border-radius: 7px;
        }

        button {
            box-shadow: 2px 4px 9px -1px;
            padding: 3px 2vw;
        }
    </style>
</head>
<?php include '_conn.php';

$username = isset($_GET['username']) ? $_GET['username'] : '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // update query
    $sql = "UPDATE `users` SET `password` = '$hashedPassword' WHERE `username` = '$username'";
    $result =  mysqli_query($conn, $sql);

    if ($result) {
        echo "";
    } else {
        echo "<br>not excuted" . mysqli_error($conn);
    }
}

?>

<body>
    <div class="main">
        <?php require 'nav.php'; ?>
        <div class="pass">
            <form action="password_reset.php" method="POST" id="form">
                <h1>Password Reset</h1>
                <div id="usernameBox">
                    <label for="username" style="margin-right: 4vw;">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $username ?>"><br>
                </div><br>

                <div id="usernameBox">
                    <label for="password" style="margin-right: 4vw;">Password</label>
                    <input type="password" name="password" id="password"><br>
                    <span class="error" style="color: red;"></span>
                </div><br>

                <div id="usernameBox">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="cpassword" id="cpassword"><br>
                    <span class="error" style="color: red;"></span>
                </div><br>

                <button type="submit" onclick="return passValidation()">Reset</button><br><br>
            </form>
        </div>
    </div>

    <script src="password_reset.js"></script>
    
</body>

</html>