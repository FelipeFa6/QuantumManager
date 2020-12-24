<?php
if(isset($_POST['submit']))
{
    session_start();
    
    $nombre = $_POST["nombre"];
    $porcentaje = $_POST["porcentaje"];
    $descripcion = $_POST["descripcion"];
    
    $idEmpresa = $_SESSION['idEmpresa'];

    require_once '../../../db_access.php';
    require_once 'functions.php';

    if(emptyInputBono($nombre, $porcentaje, $descripcion) !== false){
        header("location: ../impuesto.php?error=emptyInput");
        exit();
    }
    createImpuesto($conn, $nombre, $porcentaje, $descripcion, $idEmpresa);
    
}else{
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";
}