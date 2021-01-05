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
        <link href="CSS/impuesto.css" rel="stylesheet" type="text/css">  
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
                    <h1 id="titulo">Gestionar Impuestos:</h1>
                </div>

                <!-- Create Impuesto Inicio-->
                <div class="container" id="crear-impuesto">
                    <form action="includes/impuesto-create.php" method="POST">
                        <h2>Crear nuevo Impuesto:</h2>

                        <div class="sub-wrapper" id="row1">
                            <div class="input-impuesto">
                                <h3>Nombre:</h3>
                                <input id="nombre" name="nombre" type="text">
                            </div>

                            <div class="input-impuesto">
                                <h3>Porcentaje %:</h3>
                                <input id="porcentaje" name="porcentaje" type="number">
                            </div>
                        </div>
                            <div class="input-impuesto">
                                <h3>Descripcion:</h3>
                                <textarea name="descripcion"></textarea>        
                            </div>

                            <div class="msg">                                          
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyInput"){
                                        echo "<p>Debe rellenar todas las casillas.</p>";
                                    }
                                    else if($_GET["error"] == "impuestoCreated"){
                                        echo "<p style='color:#0075FF;'>Impuesto creado exitosamente!</p>";
                                    }
                                    else if($_GET["error"] == "failedCreationImpuesto"){
                                        echo "<p>ERROR AL CREAR IMPUESTO!</p>";
                                    }
                                }
                            ?>
                            </div>

                        <div class="input-impuesto">
                            <input type="submit" id="submit" name="submit" value="Crear Impuesto">
                        </div>                       
                    </form>
                </div>
                <!-- Create Impuesto Final-->

                <!-- Tabla Impuestos Inicio-->
                <div class="container" id="tabla">
                    <div class="titulo">
                        <h1>Impuestos</h1>
                    </div>

                    <div class="msg">                                          
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "failedToDeleteImpuesto"){
                                echo "<p>Error al eliminar Impuesto.</p>";
                            }
                            else if($_GET["error"] == "impuestoDeleted"){
                                echo "<p style='color:#0075FF;'>Impuesto eliminado exitosamente!</p>";
                            }
                        }
                    ?>
                    </div>

                    <table id="impuestos">
                        <tr>
                            <th>Nombre</th>
                            <th>Porcentaje</th>
                            <th>Descripcion</th>
                        </tr>
                        
                        <?php
                        require_once 'includes/functions.php';
                        require_once '../../db_access.php';
                        getImpuestos($conn, $_SESSION['idEmpresa']);
                        ?>
                    </table> 
                </div>  
                <!-- Tabla Impuestos Fin-->
            </div>
        </main>
    </body>
</html>