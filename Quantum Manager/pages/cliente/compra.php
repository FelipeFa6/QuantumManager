<?php
    session_start();
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
        <link href="CSS/compra.css" rel="stylesheet" type="text/css">  
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
                    <h1 id="titulo">Gestionar Compras:</h1>
                </div>

                <!-- Create Compra Inicio-->
                <div class="container" id="crear-compra">
                    <form action="includes/compra-create.php" method="POST">
                        <h2>Crear nueva Compra:</h2>

                        <div class="sub-wrapper" id="row1">
                            <div class="input-compra">
                                <h3>Monto $:</h3>
                                <input id="monto" name="monto" type="number">
                            </div>
                        </div>
                            <div class="input-compra">
                                <h3>Descripcion:</h3>
                                <textarea name="detalles"></textarea>        
                            </div>

                            <div class="msg">                                          
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyInput"){
                                        echo "<p>Debe rellenar todas las casillas.</p>";
                                    }
                                    else if($_GET["error"] == "compraCreated"){
                                        echo "<p style='color:#0075FF;'>Compra creada exitosamente!</p>";
                                    }
                                    else if($_GET["error"] == "failedCreationCompra"){
                                        echo "<p>ERROR AL CREAR COMPRA!</p>";
                                    }
                                }
                            ?>
                            </div>

                        <div class="input-compra">
                            <input type="submit" id="submit" name="submit" value="Crear Compra">
                        </div>                       
                    </form>
                </div>
                <!-- Create Compra Final-->

                <!-- Tabla Compras Inicio-->
                <div class="container" id="tabla">
                    <div class="titulo">
                        <h1>Historial de Compras</h1>
                    </div>

                    <div class="msg">                                          
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "failedToDeleteCompra"){
                                echo "<p>Error al eliminar Compra.</p>";
                            }
                            else if($_GET["error"] == "compraDeleted"){
                                echo "<p style='color:#0075FF;'>Compra eliminada exitosamente!</p>";
                            }
                        }
                    ?>
                    </div>

                    <table id="compras">
                        <tr>
                            <th>Monto</th>
                            <th>Fecha de Compra</th>
                            <th>Detalles</th>
                        </tr>
                        
                        <?php
                        require_once 'includes/functions.php';
                        require_once '../../db_access.php';
                        getCompras($conn, $_SESSION['idEmpresa']);
                        ?>
                    </table> 
                </div>  
                <!-- Tabla Compras Fin-->
            </div>
        </main>
    </body>
</html>