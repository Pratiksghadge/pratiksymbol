<?php
require '_conn.php';
session_start();
if(!isset($_SESSION['login']) || isset($_SESSION['login']) != true){
    header('Location: login.php');
    exit;
}

// Create statement
$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

if ($num > 0) {
    echo   "<style>
                table, tr, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    margin: 7vw 16vw;
                }
            </style>";

    echo "<table style='border: 1px solid black; border-collapse: collapse;'>";
    echo "<tr>
                <th>Sno</th>
                <th width=5vw>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Username</th>
                <th>Password</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                    <td>" .$row['sno']. "</td>
                    <td>" .$row['name']. "</td>
                    <td>" .$row['email']. "</td>
                    <td>" .$row['gender']. "</td>
                    <td>" .$row['username']. "</td>
                    <td>" .$row['password']. "</td>
                    <td>" .$row['date']. "</td>
                    <td><a href='?deleteUser=" . $row['sno'] . "'>Delete</a></td>
                  </tr>";
    }

    echo "</table>";
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['deleteUser'])) {
    $deleteUser = $_GET['deleteUser'];
    //create statement
    $sql = "DELETE FROM `users` WHERE `users`.`sno` = '$deleteUser'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "";
    } else {
        echo "Deleted row successfully!".mysqli_error($conn);
    }
}