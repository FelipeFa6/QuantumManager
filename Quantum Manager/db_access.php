<?php
    $serverName = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'quantummanager';

    $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    if(!$conn){
        die("Connection to the DataBase Failed: <br>". mysqli_connect_error());
    }