<?php

//Inputs are empty
function emptyInputSignup($rut, $nombreEmpresa, $passwd, $passwdRepeat, $direccion){
    $result = false;

    if(empty($rut) || empty($nombreEmpresa) || empty($passwd) || empty($passwdRepeat) || empty($direccion)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

// passwd verification
function passwdMatch($passwd, $passwdRepeat){
    $result = true;
    if($passwd !== $passwdRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

//DB Rut Check
function rutExists($conn, $rut){

    $sql = "SELECT * FROM empresa WHERE RUT = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../form-signup.php?error=queryError");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $rut);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

//Create User
function createUser($conn, $rut, $nombre, $passwd, $direccion){
    $fecha_creacion = date(date("Y-m-d"));

    $sql = "INSERT INTO empresa (RUT, PASSWD, NOMBRE_EMPRESA, DIRECCION, FECHA_CREACION) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../form-signup.php?error=creationFailed");
        exit();
    }

    $hashedPasswd = password_hash($passwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $rut, $hashedPasswd, $nombre, $direccion, $fecha_creacion);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../form-login.php?error=userCreated");
    exit();
}


//Login Functions
function emptyInputLogin($rut, $passwd){
    $result = false;

    if(empty($rut) || empty($passwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $rut, $passwd){
    $rutExists = rutExists($conn, $rut);

    if($rutExists === false){
        header("location: ../form-login.php?error=rutDoesNotExist");
        exit();
    }

    $passwdHashed = $rutExists["PASSWD"];
    $checkPasswd = password_verify($passwd, $passwdHashed);

    if($checkPasswd === false){
        header("location: ../form-login.php?error=wrongLogin");
        exit();
    }
    else if($checkPasswd === true){
        session_start();
        $_SESSION["idEmpresa"]  =  $rutExists["ID"];
        $_SESSION["rutEmpresa"]  =  $rutExists["RUT"];
        $_SESSION["nombreEmpresa"]  =  $rutExists["NOMBRE_EMPRESA"];
        header("location: ../../cliente/index.php");
        exit();
    }
}