<?php
    session_start();
    if(!isset($_SESSION["idEmpresa"]) || !isset($_SESSION["rutEmpresa"])){
        //Bad Case
        echo "Let's not talk about this... <br> 
        <a href = '../default/index.php'><h1>Go back...</h1> </a>";
        die();
    }
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
        <link href="CSS/venta.css" rel="stylesheet" type="text/css">  
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
                    <a href="fondo.php"><span class="fa fa-arrow-left"></span></a>
                    <h1 id="titulo">Gestionar Ventas:</h1>
                </div>

                <!-- Create Venta Inicio-->
                <div class="container" id="crear-venta">
                    <form action="includes/venta-create.php" method="POST">
                        <h2>Crear Venta:</h2>
                        <p>- Cuando la venta se genere esta tendra la fecha actual.</p><br>

                        <div class="sub-wrapper" id="row1">
                            <div class="input-venta">
                                <h3>Monto:</h3>
                                <input id="monto" name="monto" type="number">
                            </div>
                        </div>
                            <div class="input-venta">
                                <h3>Descripcion:</h3>
                                <textarea name="detalles"></textarea>        
                            </div>

                            <div class="msg">                                          
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyInput"){
                                        echo "<p>Debe rellenar todas las casillas.</p>";
                                    }
                                    else if($_GET["error"] == "ventaCreated"){
                                        echo "<p style='color:#0075FF;'>Venta creada exitosamente!</p>";
                                    }
                                    else if($_GET["error"] == "failedCreationVenta"){
                                        echo "<p>ERROR AL CREAR VENTA!</p>";
                                    }
                                    else if($_GET["error"] == "ventaUpdated"){
                                        echo "<p style='color:#0075FF;'>Venta actualizado exitosamente!</p>";
                                    }
                                    else if($_GET["error"] == "failedUpdate"){
                                        echo "<p>ERROR AL ACTUALIZAR!</p>";
                                    }
                                }
                            ?>
                            </div>

                        <div class="input-venta">
                            <input type="submit" id="submit" name="submit" value="Crear Venta">
                        </div>                       
                    </form>
                </div>
                <!-- Create Venta Final-->

                <!-- Tabla Ventas Inicio-->
                <div class="container" id="tabla">
                    <div class="titulo">
                        <h1>Historial de Ventas</h1>
                    </div>

                    <div class="msg">                                          
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "failedToDeleteVenta"){
                                echo "<p>Error al eliminar Venta.</p>";
                            }
                            else if($_GET["error"] == "ventaDeleted"){
                                echo "<p style='color:#0075FF;'>Venta eliminada exitosamente!</p>";
                            }
                        }
                    ?>
                    </div>

                    <table id="ventas">
                        <tr>
                            <th>Monto</th>
                            <th>Detalles</th>
                            <th>Fecha de compra</th>
                        </tr>
                        
                        <?php
                        require_once 'includes/functions.php';
                        require_once '../../db_access.php';
                        getVentas($conn, $_SESSION['idEmpresa']);
                        ?>
                    </table> 
                </div>  
                <!-- Tabla Ventas Fin-->
            </div>
        </main>
    </body>
</html>