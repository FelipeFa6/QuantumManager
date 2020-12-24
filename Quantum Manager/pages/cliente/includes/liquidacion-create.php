<?php

if(isset($_POST['submit']))
{
    session_start();
    
    //Trabajador
    $idTrabajador = $_POST["idTrabajador"];
    
    //Liquidacion
    $imponible = $_POST["imponible"];
    $noImponible = $_POST["no-imponible"];
    $descuento = $_POST["descuento"];
    $descuentoLegal = $_POST["descuento-legal"];



    require_once '../../../db_access.php';
    require_once 'functions.php';

    //Falta crear respectivas funciones de input
    if(emptyInputLiquidacion($imponible, $noImponible, $descuento, $descuentoLegal) !== false){
        header("location: ../trabajadores.php?error=emptyInput");
        exit();
    }
    
    //FALTA CREAR LIQUIDACION
    createLiquidacion($conn, $idTrabajador, $imponible, $noImponible, $descuento, $descuentoLegal);
    
}else{
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";
}
