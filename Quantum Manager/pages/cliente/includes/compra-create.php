<?php
if(isset($_POST['submit']))
{
    session_start();
    
    $monto = $_POST["monto"];
    $detalles = $_POST["detalles"];
    
    $idEmpresa = $_SESSION['idEmpresa'];

    require_once '../../../db_access.php';
    require_once 'functions.php';

    if(emptyInputCompra($monto, $detalles) !== false){
        header("location: ../compra.php?error=emptyInput");
        exit();
    }
    createCompra($conn, $monto, $detalles, $idEmpresa);
    
}else{
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";
}