<?php
if(isset($_POST['submit'])){ 
    require_once '../../../db_access.php';
    require_once 'functions.php';

    $idCompra = $_POST['idCompra'];

    deleteCompra($conn, $idCompra);
}else{
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";
}