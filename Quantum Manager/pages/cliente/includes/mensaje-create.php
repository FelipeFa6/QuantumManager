<?php

if(isset($_POST['submit']))
{   
    session_start();
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    $fecha = date("Y-m-d");
    
    $idEmpresa = $_SESSION['idEmpresa'];

    require_once '../../../db_access.php';
    require_once 'functions.php';

    if(emptyInputMensaje($titulo, $descripcion) !== false){
        header("location: ../mensaje.php?error=emptyInput");
        exit();
    }

    createMensaje($conn, $titulo, $descripcion, $fecha, $idEmpresa);
    
}else{
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";
}
