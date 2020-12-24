<?php

if(isset($_POST['submit']))
{   
    session_start();
    
    $rut = $_POST["rut"];
    $nombre = $_POST["nombre"];
    
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    
    $idEmpresa = $_SESSION['idEmpresa'];

    require_once '../../../db_access.php';
    require_once 'functions.php';

    if(emptyInputTrabajador($rut, $nombre, $apellido, $email) !== false){
        header("location: ../trabajadores.php?error=emptyInput");
        exit();
    }

    createTrabajador($conn, $idEmpresa, $rut, $nombre, $apellido, $email);
    
}else{
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";
}
