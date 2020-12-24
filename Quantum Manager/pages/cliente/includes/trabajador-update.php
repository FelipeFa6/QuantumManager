<?php

if(isset($_POST['submit'])){ 
    require_once '../../../db_access.php';
    require_once 'functions.php';

    $id = $_POST['id'];
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    

    if(emptyInputTrabajador($id, $rut, $nombre, $apellido, $email) !== false){
        header("location: ../trabajadores.php?error=updateEmptyInput");
        exit();
    }
    updateTrabajador($conn, $id, $rut, $nombre, $apellido, $email);
}else{
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";
}