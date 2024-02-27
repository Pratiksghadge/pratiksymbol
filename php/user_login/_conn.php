<?php
    //connect database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbase = "test";

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbase);

    //die if connection is not seccure
    if(!$conn){
        die("You connection is not created successfully!".mysqli_connect_error());
    } else {
        echo "";
    }
?>