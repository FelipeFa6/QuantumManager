<?php
    if(isset($_POST["submit"])){
        $rut = $_POST["rut"];
        $passwd = $_POST["passwd"];

        require_once '../../../db_access.php';
        require_once 'functions.php';

        //Error handlers
        if(emptyInputLogin($rut, $passwd) !== false){
            header("location: ../form-login.php?error=emptyInput");
            exit();
        }

        loginUser($conn, $rut, $passwd);

    }else{
        echo "Let's not talk about this. <br>";
        echo "<a href = '../form-login.php'><h1>Go back...</h1></a>";
    }