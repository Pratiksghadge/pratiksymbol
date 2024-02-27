<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            justify-content: space-between;

            h1 {
                margin-left: 5vw;
                align-self: center;
                color: #fff;
                font-variant-caps: petite-caps;
            }

            ul {
                display: flex;
                gap: 5vw;
                margin-right: 4vw;
                list-style: none;
                align-self: center;
                font: caption;
                font-weight: 600;

                a {
                    text-decoration: none;
                    color: #fff;
                }
            }
        }
        button{
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">SignUp</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>

</html>