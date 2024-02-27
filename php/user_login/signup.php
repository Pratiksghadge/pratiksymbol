<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
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

        .sign {
            text-align: -webkit-center;
            display: inline-block;
            padding: 2vw;
            box-shadow: inset -5vw 0vw 7vw 6vw white;
            border-radius: 2vw;
        }

        .sign h1 {
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

<body>
    <?php include '_conn.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if (isset($_POST['username'])) {
            //create statement 
            $sql = "SELECT * FROM `users` WHERE `username` = '$username'";   // username not should be same
            $result = mysqli_query($conn, $sql);

            $num = mysqli_num_rows($result);
            if ($num == 0) {
                $hash = password_hash($password, PASSWORD_DEFAULT);        // we use password hash where in db hide the pass 
                //create statement 
                $sql = "INSERT INTO `users` ( `name`, `email`, `gender`, `username`, `password`, `date`) VALUES ('$name', '$email', '$gender', '$username', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "";
                } else {
                    echo "Your query don't excuted!" . mysqli_error($conn);
                }
            } else {
                echo "<script>alert('Username already exist, Please try to new one.')</script>";
            }
        }
    }
    ?>
    <div class="main">
        <?php require 'nav.php' ?>
        <div class="sign">
            <form action="signup.php" method="POST" id="form">
                <h1>SignUp Form</h1>
                <div id="namebox">
                    <label for="name" style="margin-right: 6vw;">Name</label>
                    <input type="text" name="name" id="name"><br>
                    <span class="error" style="color: red; "></span>
                </div>
                <br>

                <div id="emailbox">
                    <label for="email" style="margin-right: 6vw;">Email</label>
                    <input type="email" name="email" id="email"><br>
                    <span class="error" style="color: red;"></span>
                </div>
                <br>

                <div id="genderbox">
                    <label for="gender" style="margin-right: 9vw;">Gender</label>
                    <input type="radio" name="gender" value="male" id="male">Male
                    <input type="radio" name="gender" value="female" id="female">Female<br>
                    <span class="error" style="color: red;"></span>
                </div><br>

                <div id="usernamebox">
                    <label for="username" style="margin-right: 4vw;">Username</label>
                    <input type="text" name="username" id="username"><br>
                    <span class="error" style="color: red;"></span>
                </div>
                <br>

                <div id="passwordbox">
                    <label for="password" style="margin-right: 4vw;">Password</label>
                    <input type="password" name="password" id="password"><br>
                    <span class="error" style="color: red;"></span>
                </div>
                <br>

                <div id="cpasswordbox">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="cpassword" id="cpassword"><br>
                    <span class="error" style="color: red;"></span>
                </div>
                <br>

                <button type="submit" onclick="return submitform()?alert('Your form to submit, you want to submit the form.'):null;">SignUp</button><br><br>
            </form>
        </div>
    </div>

    <script src="signup.js"></script>

</body>

</html>