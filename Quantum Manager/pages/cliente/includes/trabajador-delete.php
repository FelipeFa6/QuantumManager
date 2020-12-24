<?php
if(isset($_POST['submit'])){ 
    require_once '../../../db_access.php';
    require_once 'functions.php';

    $idTrabajador = $_POST['idTrabajador'];

    deleteTrabajador($conn, $idTrabajador);
}else{
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";
}