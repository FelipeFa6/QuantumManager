<?php
    if(isset($_POST['submit']))
    {   
        $rut = $_POST["rut"];
        $nombre = $_POST["nombre"];
        
        $passwd = $_POST["passwd"];
        $passwdRepeat = $_POST["passwdConf"];

        $direccion = $_POST["direccion"];
        
        require_once '../../../db_access.php';
        require_once 'functions.php';

        if(emptyInputSignup($rut, $nombre, $passwd, $passwdRepeat, $direccion) !== false){
            header("location: ../form-signup.php?error=emptyInput");
            exit();
        }
        //Falta agregar un verificador de RUT Empresa.
        if(passwdMatch($passwd, $passwdRepeat)){
            header("location: ../form-signup.php?error=passwdMatch");
            exit();
        }
        if(rutExists($conn, $rut)){
            header("location: ../form-signup.php?error=rutExists");
            exit();
        }
        
        createUser($conn, $rut, $nombre, $passwd, $direccion);
        
    }else{
        //Bad Case
        echo "Let's not talk about this... <br> 
        <a href = '../form-signup.php'> <h1>Go back...</h1> </a>";
    }
