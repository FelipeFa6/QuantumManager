<?php
    $idTrabajador = $_POST['idTrabajador'];
    $nombreTrabajador = $_POST['nombreTrabajador'];
    $apellidoTrabajador = $_POST['apellidoTrabajador'];
    $rutTrabajador = $_POST['rutTrabajador'];
?>

<html>
    <header>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Menu Cliente</title>
        
        <!-- 
        NOTE: The fonts will be independently 'imported' in the .CSS files
        -->
        
        <!-- CSS -->
        <link href="../../fonts/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="CSS/Essentials/main.css" rel="stylesheet" type="text/css">
        <link href="CSS/trabajador-liquidacion.css" rel="stylesheet" type="text/css">
    </header>
    
    <body>
        <div class="background">
        </div>
        

        <?php
            require_once 'main-nav.php';
        ?>

        <main>
            <div class="wrapper">
                <div class="cabecera">
                    <a href="trabajadores.php"><span class="fa fa-arrow-left"></span></a>
                    <h1 id="titulo">Generar liquidacion:</h1>
                </div>


                <div class="titulo">
                    <h1>IMPORTANTE:</h1>
                    <p>- La liquidacion se generara con la fecha actual.</p>
                    <p>- No se pueden eliminar ni editar.</p>
                    <br>
                    <p>- Cuando la liquidacion sea creada el sistema generara 3 nuevos atributos:</p>
                    <p> &nbsp;&nbsp;&nbsp; 1) Descuento Total</p>
                    <p> &nbsp;&nbsp;&nbsp; 2) Total de Haberes</p>
                    <p> &nbsp;&nbsp;&nbsp; 3) Sueldo Liquido</p>
                    
                </div>

                <div class="container">
                    <h1>Trabajador:</h1>
                    <h3>Name:
                        <?php echo $nombreTrabajador; echo $apellidoTrabajador;?>
                    </h3>
                    <h3>RUT:
                        &nbsp;&nbsp;&nbsp;
                        <?php echo $rutTrabajador;?>
                    </h3>

                </div>

                <!-- Inicio de Crear Liquidacion-->
                <div class="container" id="actualizar-trabajador">
                    <form action="includes/liquidacion-create.php" method="POST">

                        <input type='hidden' id='idTrabajador' name='idTrabajador' value='<?php echo $idTrabajador;?>'>
                        <input type='hidden' id='nombreTrabajador' name='nombreTrabajador' value='<?php echo $nombreTrabajador;?>'>
                        <input type='hidden' id='apellidoTrabajador' name='apellidoTrabajador' value='<?php echo $apellidoTrabajador;?>'>
                        <input type='hidden' id='rutTrabajador' name='rutTrabajador' value='<?php echo $rutTrabajador;?>'>

                        <div class="sub-wrapper" id="row1">
                            <div class="input-liquidacion">
                                <p>Imponible:</p>
                                <input id="imponible" name="imponible" type="number" placeholder="">
                            </div>

                            <div class="input-liquidacion">
                                <p>NO Imponible:</p>
                                <input id="no-imponible" name="no-imponible" type="number" placeholder="">
                            </div>
                        </div>

                        <div class="sub-wrapper">

                            <div class="input-liquidacion">
                                <p>Descuento:</p>
                                <input id="descuento" name="descuento" type="number" placeholder="">
                            </div>

                            <div class="input-liquidacion">
                                <p>Descuento legal:</p>
                                <input id="descuento-legal" name="descuento-legal" type="number" placeholder="">
                            </div>
                        </div>

                        <div class="input-liquidacion">
                            <input type="submit" id="submit" name="submit" value="Crear liquidacion">
                        </div>

                        
                    </form>
                </div>
                <!-- Final de Create Liquidacion -->

                <!-- Tabla Liquidacion Inicio-->
                <div class="container" id="tabla">
                    <div class="titulo">
                        <h1>Historial:</h1>
                        <p>Liquidaciones de "<?php echo $nombreTrabajador; echo $apellidoTrabajador;?>"</p>
                    </div>

                    <div class="msg">                                          
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "failedToDeleteBono"){
                                echo "<p>Error al eliminar bono.</p>";
                            }
                            else if($_GET["error"] == "bonoDeleted"){
                                echo "<p style='color:#0075FF;'>Bono eliminado exitosamente!</p>";
                            }
                        }
                    ?>
                    </div>

                    <table id="liquidacion">
                        <tr>
                            <th>Imponible</th>
                            <th>No imponible</th>
                            <th>Total Liquido</th>
                            <th>Descuento</th>
                            <th>Descuento Legal</th>
                            <th>Total Descuento</th>
                            <th>Total Haberes</th>
                            <th>Fecha</th>
                        </tr>
                        
                        <?php
                        require_once 'includes/functions.php';
                        require_once '../../db_access.php';
                        getLiquidacionTrabajador($conn, $idTrabajador);
                        ?>
                    </table> 
                </div>  
                <!-- Tabla Liquidacion Fin-->

            </div>

        </main>
    </body>
</html>