<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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

        .login {
            margin-top: 13vh;
            text-align: -webkit-center;
            display: inline-block;
            padding: 2vw;
            box-shadow: inset -7vw 0vw 6vw 6vw white;
            border-radius: 2vw;
        }

        .login h1 {
            margin-top: 0px;
            display: inline-block;
            border-radius: 7px;
        }

        h4 {
            text-align-last: left;
            display: table;
            margin-right: 9vw;
            cursor: pointer;
        }

        button {
            box-shadow: 2px 4px 9px -1px;
            padding: 3px 2vw;
        }
    </style>
</head>
<?php include '_conn.php';

        $passalert = false;
        $userpassalert = false;
        $empty = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $empty = true;
            } else {
                //check in users
                $sql = "SELECT * FROM `users` WHERE `username` = '$username'";     // username should correct
                $result = mysqli_query($conn, $sql);

                $num = mysqli_num_rows($result);

                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (password_verify($password, $row['password'])) {
                            session_start();
                            $_SESSION['login'] = true;
                            $_SESSION['username'] = $username;
                            header('Location: dashboard.php');
                        } else {
                            $passalert = true;
                        }
                    }
                } else {
                    $userpassalert = true;
                }
            }
        }

        // check in admin
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            //create statement
            $sql = "SELECT * FROM `admin` WHERE `username` = '$username'";     // username should correct
            $result = mysqli_query($conn, $sql);

            $num = mysqli_num_rows($result);

            if ($num > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    header('Location: record.php');
                }
            }
        }
        ?>

<body>
    <div class="main">
        <?php require 'nav.php' ?>
        <div class="login">
            <form method="POST" action="login.php" id="form">
                <h1>Login Form</h1>
                <div id="usernameBox">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"><br>
                    <span class="error" style="color: red;"></span>
                </div><br>

                <div id="passwordBox">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"><br>
                    <span class="error" style="color: red;"></span>
                </div>

                <h4 onclick="forgotPassword(); if (!username) { alert('Please enter a username to reset the password.'); }">Forget Password?</a></h4>
                <button type="submit" onclick="return submitForm()">Login</button>
            </form><br>
        </div>
    </div>

    <script src="login.js"></script>

</body>

</html>