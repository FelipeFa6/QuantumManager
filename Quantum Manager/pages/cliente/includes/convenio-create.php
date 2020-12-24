<?php
if(isset($_POST['submit']))
{
    session_start();
    
    $nombre = $_POST["nombre"];
    $monto = $_POST["monto"];
    $descripcion = $_POST["descripcion"];
    
    $idEmpresa = $_SESSION['idEmpresa'];

    require_once '../../../db_access.php';
    require_once 'functions.php';

    if(emptyInputConvenio($nombre, $monto, $descripcion) !== false){
        header("location: ../convenio.php?error=emptyInput");
        exit();
    }
    createConvenio($conn, $nombre, $monto, $descripcion, $idEmpresa);
    
}else{
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";
}