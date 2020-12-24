<?php
if(isset($_POST['submit']))
{
    session_start();
    
    $monto = $_POST["monto"];
    $motivo = $_POST["motivo"];
    
    $idEmpresa = $_SESSION['idEmpresa'];

    require_once '../../../db_access.php';
    require_once 'functions.php';

    if(emptyInputMulta($monto, $motivo) !== false){
        header("location: ../multa.php?error=emptyInput");
        exit();
    }
    createMulta($conn, $monto, $motivo, $idEmpresa);
    
}else{
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";
}