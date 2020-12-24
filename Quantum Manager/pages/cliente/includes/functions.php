<?php

/* INDEX */
function getMensajesEmpresa($conn, $idEmpresa){
    
    $sql = "SELECT * FROM mensaje WHERE fk_empresa = $idEmpresa";

    $result = mysqli_query($conn, $sql);
    while($messages = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<div class='container'>";
        echo "<h1>". $messages['TITULO']. ":</h1>";
        echo "<h3>". $messages['FECHA']. "</h3>";
        echo "<p>". $messages['DESCRIPCION']. "</p>";
        echo "</div>";
    }
    mysqli_close($conn);
}



/* TRABAJADOR */
function emptyInputTrabajador($rut, $nombre, $apellido, $email){
    $result = false;

    if(empty($rut) || empty($nombre) || empty($apellido) || empty($email)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function createTrabajador($conn, $idEmpresa, $rut, $nombre, $apellido, $email){
    $sql = "INSERT INTO trabajador (RUT, NOMBRE, APELLIDO, EMAIL, FK_EMPRESA) VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../trabajadores.php?error=failedCreation");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $rut, $nombre, $apellido, $email, $idEmpresa);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../trabajadores.php?error=trabajadorCreate");
    exit();
}

function getTrabajadores($conn, $idEmpresa){
    
    $sql = "SELECT * FROM trabajador WHERE fk_empresa = $idEmpresa";

    $result = mysqli_query($conn, $sql);

    
    while($trabajador = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td>". $trabajador['RUT']. "</td>";
        echo "<td>". $trabajador['NOMBRE']. "</td>";
        echo "<td>". $trabajador['APELLIDO']. "</td>";
        echo "<td>". $trabajador['EMAIL']. "</td>";


        echo "<td>";
        echo "<form action='includes/trabajador-delete.php' method='POST'>";
        echo "<input type='hidden' id='idTrabajador' name='idTrabajador' value=' ". $trabajador['ID']."'>";
        echo "<input type='submit' name='submit' value='Eliminar'>";
        echo "</form></td>";

        echo "<td>";
        echo "<form action='trabajador-actualizar.php' method='POST'>";
        echo "<input type='hidden' id='idTrabajador' name='idTrabajador' value=' ". $trabajador['ID']."'>";
        echo "<input type='hidden' id='rutTrabajador' name='rutTrabajador' value=' ". $trabajador['RUT']."'>";
        echo "<input type='hidden' id='nombreTrabajador' name='nombreTrabajador' value=' ". $trabajador['NOMBRE']."'>";
        echo "<input type='hidden' id='apellidoTrabajador' name='apellidoTrabajador' value=' ". $trabajador['APELLIDO']."'>";
        echo "<input type='hidden' id='emailTrabajador' name='emailTrabajador' value=' ". $trabajador['EMAIL']."'>";
        echo "<input type='submit' name='submit' value='Actualizar'>";
        echo "</form></td>";


        echo "<td>";
        echo "<form action='trabajador-liquidacion.php' method='POST'>";
        echo "<input type='hidden' id='idTrabajador' name='idTrabajador' value=' ". $trabajador['ID']."'>";
        echo "<input type='hidden' id='rutTrabajador' name='rutTrabajador' value=' ". $trabajador['RUT']."'>";
        echo "<input type='hidden' id='nombreTrabajador' name='nombreTrabajador' value=' ". $trabajador['NOMBRE']."'>";
        echo "<input type='hidden' id='apellidoTrabajador' name='apellidoTrabajador' value=' ". $trabajador['APELLIDO']."'>";
        echo "<input type='submit' name='submit' value='Liquidacion'>";
        echo "</form></td>";
        echo "</tr>";
    }
    mysqli_close($conn);
}

/* DELETE TRABAJADOR*/
function deleteTrabajador($conn, $idTrabajador){
    $sql = "DELETE FROM trabajador WHERE id = '$idTrabajador'";

    $result = mysqli_query($conn, $sql);    
    if(!$result){
        header("location: ../trabajadores.php?error=failedToDeleteTrabajador");
        exit();
    }
    header("location: ../trabajadores.php?error=trabajadorDeleted");
    exit();
}

/* UPDATE TRABAJADOR FUNCTIONS*/
function updateTrabajador($conn, $id, $rut, $nombre, $apellido, $email){

    $sql  = "UPDATE trabajador SET RUT = ?, NOMBRE = ?, APELLIDO = ?, EMAIL = ? WHERE ID = ?;";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../trabajador-actualizar.php?error=failedUpdate");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $rut, $nombre, $apellido, $email, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../trabajadores.php?error=trabajadorUpdated");
    exit();
}


/* BONOS FUNCTIONS */
function emptyInputBono($nombre, $monto, $descripcion){
    $result = false;

    if(empty($nombre) || empty($monto) || empty($descripcion)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createBono($conn, $nombre, $monto, $descripcion, $idEmpresa){
    $sql = "INSERT INTO bono (NOMBRE, DESCRIPCION, MONTO, FK_EMPRESA) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../bono.php?error=failedCreation");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssi", $nombre, $descripcion, $monto, $idEmpresa);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../bono.php?error=bonoCreated");
    exit();
}

function getBonos($conn, $idEmpresa){
    
    $sql = "SELECT * FROM bono WHERE fk_empresa = $idEmpresa";

    $result = mysqli_query($conn, $sql);

    
    while($bono = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td>". $bono['NOMBRE']. "</td>";
        echo "<td>$ ". number_format($bono['MONTO'] , 0, ',', '.'). "</td>";
        echo "<td>". $bono['DESCRIPCION']. "</td>";


        echo "<td>";
        echo "<form action='includes/bono-delete.php' method='POST'>";
        echo    "<input type='hidden' id='idBono' name='idBono' value=' ". $bono['ID']."'>";
        echo    "<input type='submit' name='submit' value='Quitar'>";
        echo "</form></td>";

        echo "<td>";
        echo "<form action='bono-editar.php' method='POST'>";
        echo    "<input type='hidden' id='idBono' name='idBono' value=' ". $bono['ID']."'>";
        echo    "<input type='hidden' id='nombreBono' name='nombreBono' value=' ". $bono['NOMBRE']."'>";
        echo    "<input type='hidden' id='descripcionBono' name='descripcionBono' value=' ". $bono['DESCRIPCION']."'>";
        echo    "<input type='hidden' id='montoBono' name='montoBono' value=' ". $bono['MONTO']."'>";
        echo    "<input type='submit' name='submit' value='Editar'>";
        echo "</form></td>";
        echo "</tr>";
    }
    mysqli_close($conn);
}

function deleteBono($conn, $idBono){
    $sql = "DELETE FROM bono WHERE ID = '$idBono'";

    $result = mysqli_query($conn, $sql);    
    if(!$result){
        header("location: ../bono.php?error=failedToDeleteBono");
        exit();
    }
    header("location: ../bono.php?error=bonoDeleted");
    exit();
}

function updateBono($conn, $id, $nombre, $monto, $descripcion){
    $sql  = "UPDATE bono SET NOMBRE = ?, MONTO = ?, DESCRIPCION = ? WHERE ID = ?;";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../bono.php?error=failedUpdate");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sisi", $nombre, $monto, $descripcion, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../bono.php?error=bonoUpdated");
    exit();
}




/*MENSAJE FUNCTIONS */

function emptyInputMensaje($nombre, $descripcion){
    $result = false;

    if(empty($nombre) || empty($descripcion)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function getMensajes($conn, $idEmpresa){
    $sql = "SELECT * FROM mensaje WHERE fk_empresa = $idEmpresa";

    $result = mysqli_query($conn, $sql);

    
    while($mensaje = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td>". $mensaje['TITULO']. "</td>";
        echo "<td>".$mensaje['DESCRIPCION']. "</td>";
        echo "<td>". $mensaje['FECHA']. "</td>";


        echo "<td>";
        echo "<form action='includes/mensaje-delete.php' method='POST'>";
        echo    "<input type='hidden' id='idMensaje' name='idMensaje' value=' ". $mensaje['ID']."'>";
        echo    "<input type='submit' name='submit' value='Quitar'>";
        echo "</form></td>";

        echo "<td>";
        echo "<form action='index.php' method='POST'>";
        echo    "<input type='submit' name='submit' value='Examinar'>";
        echo "</form></td>";
        echo "</tr>";
    }
    mysqli_close($conn);
}

function deleteMensaje($conn, $idMensaje){
    $sql = "DELETE FROM mensaje WHERE ID = '$idMensaje'";

    $result = mysqli_query($conn, $sql);    
    if(!$result){
        header("location: ../mensaje.php?error=failedToDeleteMensaje");
        exit();
    }
    header("location: ../mensaje.php?error=mensajeDeleted");
    exit();
}


function createMensaje($conn, $titulo, $descripcion, $fecha, $idEmpresa){
    $sql = "INSERT INTO mensaje (TITULO, DESCRIPCION, FECHA, FK_EMPRESA) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../mensaje.php?error=failedCreation");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssi", $titulo, $descripcion, $fecha, $idEmpresa);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../mensaje.php?error=mensajeCreated");
    exit();
}


/*  LIQUIDACION */
function emptyInputLiquidacion($imponible, $noImponible, $descuento, $descuentoLegal){
    $result = false;

    if(empty($imponible) || empty($noImponible) || empty($descuento) || empty($descuentoLegal)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createLiquidacion($conn, $idTrabajador, $imponible, $noImponible, $descuento, $descuentoLegal){
    $sql = "INSERT INTO liquidacion (FECHA, IMPONIBLE, NO_IMPONIBLE, DESCUENTO, DESCUENTO_LEGAL, TOTAL_DESCUENTO, TOTAL_LIQUIDO, TOTAL_HABERES, FK_TRABAJADOR) VALUES (?,?,?,?,?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../trabajadores.php?error=failedLiquidacionCreation");
        exit();
    }

    $date = date("Y-m-d");
    $totalDescuento = ($descuento + $descuentoLegal);
    $totalLiquido  = ($imponible + $noImponible) - $totalDescuento;
    $totalHaberes  = ($imponible + $noImponible + $totalLiquido);
    
    mysqli_stmt_bind_param($stmt, "siiiiiiii", $date, $imponible, $noImponible, $descuento, $descuentoLegal, $totalDescuento, $totalLiquido, $totalHaberes, $idTrabajador);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../trabajadores.php?error=liquidacionCreated");
    exit();
}

function getLiquidacionTrabajador($conn, $idTrabajador){
    $sql = "SELECT * FROM liquidacion WHERE fk_trabajador = $idTrabajador";

    $result = mysqli_query($conn, $sql);

    
    while($liquidacion = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>";
        echo    "<td>$ ". number_format($liquidacion['IMPONIBLE'] , 0, ',', '.'). "</td>";
        echo    "<td>$ ". number_format($liquidacion['NO_IMPONIBLE'] , 0, ',', '.'). "</td>";

        echo    "<td style='color: blue;'>$ ". number_format($liquidacion['TOTAL_LIQUIDO'] , 0, ',', '.'). "</td>";

        echo    "<td>$ ". number_format($liquidacion['DESCUENTO'] , 0, ',', '.'). "</td>";
        echo    "<td>$ ". number_format($liquidacion['DESCUENTO_LEGAL'] , 0, ',', '.'). "</td>";

        echo    "<td style='color: blue;'>$ ". number_format($liquidacion['TOTAL_DESCUENTO'] , 0, ',', '.'). "</td>";
        echo    "<td style='color: blue;'>$ ". number_format($liquidacion['TOTAL_HABERES'] , 0, ',', '.'). "</td>";

        echo    "<td>". $liquidacion['FECHA'] ."</td>";
        
        echo "</tr>";
    }
    mysqli_close($conn);
}




//FUNCTION CONVENIO
function emptyInputConvenio($nombre, $monto, $descripcion){
    $result = false;

    if(empty($nombre) || empty($monto) || empty($descripcion)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createConvenio($conn, $nombre, $monto, $descripcion, $idEmpresa){
    $sql = "INSERT INTO convenio (NOMBRE, MONTO, DESCRIPCION, FECHA_CREACION, FK_EMPRESA) VALUES (?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../convenio.php?error=failedConvenioCreation");
        exit();
    }

    $date = date("Y-m-d");
    
    mysqli_stmt_bind_param($stmt, "sissi", $nombre, $monto, $descripcion, $date, $idEmpresa);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../convenio.php?error=convenioCreated");
    exit();
}


function getConvenios($conn, $idEmpresa){
    
    $sql = "SELECT * FROM convenio WHERE fk_empresa = $idEmpresa";

    $result = mysqli_query($conn, $sql);

    
    while($convenio = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td>". $convenio['NOMBRE']. "</td>";
        echo "<td>$ ". number_format($convenio['MONTO'] , 0, ',', '.'). "</td>";
        echo "<td>". $convenio['DESCRIPCION']. "</td>";
        echo "<td>". $convenio['FECHA_CREACION']. "</td>";


        echo "<td>";
        echo "<form action='includes/convenio-delete.php' method='POST'>";
        echo    "<input type='hidden' id='idConvenio' name='idConvenio' value=' ". $convenio['ID']."'>";
        echo    "<input type='submit' name='submit' value='Quitar'>";
        echo "</form></td>";

        echo "<td>";
        echo "<form action='convenio-editar.php' method='POST'>";
        echo    "<input type='hidden' id='idConvenio' name='idConvenio' value=' ". $convenio['ID']."'>";
        echo    "<input type='hidden' id='nombreConvenio' name='nombreConvenio' value=' ". $convenio['NOMBRE']."'>";
        echo    "<input type='hidden' id='montoConvenio' name='montoConvenio' value=' ". $convenio['MONTO']."'>";
        echo    "<input type='hidden' id='descripcionConvenio' name='descripcionConvenio' value=' ". $convenio['DESCRIPCION']."'>";
        echo    "<input type='submit' name='submit' value='Editar'>";
        echo "</form></td>";
        echo "</tr>";
    }
    mysqli_close($conn);
}


function deleteConvenio($conn, $idConvenio){
    $sql = "DELETE FROM convenio WHERE ID = '$idConvenio'";

    $result = mysqli_query($conn, $sql);    
    if(!$result){
        header("location: ../convenio.php?error=failedToDeleteConvenio");
        exit();
    }
    header("location: ../convenio.php?error=convenioDeleted");
    exit();
}

function updateConvenio($conn, $id, $nombre, $monto, $descripcion){
    
    $sql  = "UPDATE convenio SET NOMBRE = ?, MONTO = ?, DESCRIPCION = ? WHERE ID = ?;";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../convenio.php?error=failedUpdate");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssi", $nombre, $monto, $descripcion, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../convenio.php?error=convenioUpdated");
    exit();
}




//Functions VENTA

function emptyInputVenta($monto, $detalles){
    $result = false;

    if(empty($monto) || empty($detalles)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createVenta($conn, $monto, $detalles, $idEmpresa){
    $sql = "INSERT INTO venta (FECHA_VENTA, DETALLES, MONTO, FK_EMPRESA) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../venta.php?error=failedCreationVenta");
        exit();
    }

    $date = date("Y-m-d");
    
    mysqli_stmt_bind_param($stmt, "ssii", $date, $detalles, $monto, $idEmpresa);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../venta.php?error=ventaCreated");
    exit();
}

function getVentas($conn, $idEmpresa){
    $sql = "SELECT * FROM venta WHERE fk_empresa = $idEmpresa";

    $result = mysqli_query($conn, $sql);

    
    while($venta = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td>$ ". number_format($venta['MONTO'] , 0, ',', '.'). "</td>";
        echo "<td>". $venta['DETALLES']. "</td>";
        echo "<td>". $venta['FECHA_VENTA']. "</td>";


        echo "<td>";
        echo "<form action='includes/venta-delete.php' method='POST'>";
        echo    "<input type='hidden' id='idVenta' name='idVenta' value=' ". $venta['ID']."'>";
        echo    "<input type='submit' name='submit' value='Eliminar'>";
        echo "</form></td>";
    }
    mysqli_close($conn);
}

function deleteVenta($conn, $idVenta){
    $sql = "DELETE FROM venta WHERE ID = '$idVenta'";

    $result = mysqli_query($conn, $sql);    
    if(!$result){
        header("location: ../venta.php?error=failedToDeleteVenta");
        exit();
    }
    header("location: ../venta.php?error=ventaDeleted");
    exit();
}


// FUNCTIONS IMPUESTO
function emptyInputImpuesto($nombre, $porcentaje, $descripcion){
    $result = false;

    if(empty($nombre) || empty($porcentaje) || empty($descripcion)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createImpuesto($conn, $nombre, $porcentaje, $descripcion, $idEmpresa){
    $sql = "INSERT INTO impuesto (NOMBRE, DESCRIPCION, PORCENTAJE, FK_EMPRESA) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../impuesto.php?error=failedCreationImpuesto");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssii", $nombre, $descripcion, $porcentaje, $idEmpresa);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../impuesto.php?error=impuestoCreated");
    exit();
}

function getImpuestos($conn, $idEmpresa){
    $sql = "SELECT * FROM impuesto WHERE fk_empresa = $idEmpresa";

    $result = mysqli_query($conn, $sql);

    
    while($impuesto = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td>". $impuesto['NOMBRE']. "</td>";
        echo "<td>". $impuesto['PORCENTAJE']. "%</td>";
        echo "<td>". $impuesto['DESCRIPCION']. "</td>";


        echo "<td>";
        echo "<form action='includes/impuesto-delete.php' method='POST'>";
        echo    "<input type='hidden' id='idImpuesto' name='idImpuesto' value=' ". $impuesto['ID']."'>";
        echo    "<input type='submit' name='submit' value='Eliminar'>";
        echo "</form></td>";
    }
    mysqli_close($conn);
}

function deleteImpuesto($conn, $idImpuesto){
    $sql = "DELETE FROM impuesto WHERE ID = '$idImpuesto'";

    $result = mysqli_query($conn, $sql);    
    if(!$result){
        header("location: ../impuesto.php?error=failedToDeleteImpuesto");
        exit();
    }
    header("location: ../impuesto.php?error=impuestoDeleted");
    exit();
}

//Functions Compras
function emptyInputCompra($monto, $detalles){
    $result = false;

    if(empty($monto) || empty($detalles)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createCompra($conn, $monto, $detalles, $idEmpresa){
    $sql = "INSERT INTO compra (MONTO, DETALLES, FECHA_COMPRA, FK_EMPRESA) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../compra.php?error=failedCreationCompra");
        exit();
    }

    $date = date("Y-m-d");

    mysqli_stmt_bind_param($stmt, "issi", $monto, $detalles, $date, $idEmpresa);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../compra.php?error=compraCreated");
    exit();
}

function getCompras($conn, $idEmpresa){
    $sql = "SELECT * FROM compra WHERE fk_empresa = $idEmpresa";

    $result = mysqli_query($conn, $sql);

    
    while($compra = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td>". $compra['MONTO']. "</td>";
        echo "<td>". $compra['FECHA_COMPRA']. "</td>";
        echo "<td>". $compra['DETALLES']. "</td>";


        echo "<td>";
        echo "<form action='includes/compra-delete.php' method='POST'>";
        echo    "<input type='hidden' id='idCompra' name='idCompra' value=' ". $compra['ID']."'>";
        echo    "<input type='submit' name='submit' value='Eliminar'>";
        echo "</form></td>";
    }
    mysqli_close($conn);
}

function deleteCompra($conn, $idCompra){
    $sql = "DELETE FROM compra WHERE ID = '$idCompra'";

    $result = mysqli_query($conn, $sql);    
    if(!$result){
        header("location: ../compra.php?error=failedToDeleteCompra");
        exit();
    }
    header("location: ../compra.php?error=compraDeleted");
    exit();
}

//Functions Multa

function emptyInputMulta($monto, $motivo){
    $result = false;

    if(empty($monto) || empty($motivo)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createMulta($conn, $monto, $motivo, $idEmpresa){
    $sql = "INSERT INTO multa (MONTO, MOTIVO, FECHA_MULTA, FK_EMPRESA) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../multa.php?error=failedCreationMulta");
        exit();
    }

    $date = date("Y-m-d");

    mysqli_stmt_bind_param($stmt, "issi", $monto, $motivo, $date, $idEmpresa);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../multa.php?error=multaCreated");
    exit();
}

function getMultas($conn, $idEmpresa){
    $sql = "SELECT * FROM multa WHERE fk_empresa = $idEmpresa";

    $result = mysqli_query($conn, $sql);

    
    while($multa = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td>$ ". number_format($multa['MONTO'] , 0, ',', '.'). "</td>";
        echo "<td>". $multa['FECHA_MULTA']. "</td>";
        echo "<td>". $multa['MOTIVO']. "</td>";


        echo "<td>";
        echo "<form action='includes/multa-delete.php' method='POST'>";
        echo    "<input type='hidden' id='idMulta' name='idMulta' value=' ". $multa['ID']."'>";
        echo    "<input type='submit' name='submit' value='Eliminar'>";
        echo "</form></td>";
    }
    mysqli_close($conn);
}

function deleteMulta($conn, $idMulta){
    $sql = "DELETE FROM multa WHERE ID = '$idMulta'";

    $result = mysqli_query($conn, $sql);    
    if(!$result){
        header("location: ../multa.php?error=failedToDeleteMulta");
        exit();
    }
    header("location: ../multa.php?error=multaDeleted");
    exit();
}
