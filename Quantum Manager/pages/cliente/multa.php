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
        <link href="CSS/multa.css" rel="stylesheet" type="text/css">  
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
                    <h1 id="titulo">Gestionar Multas:</h1>
                </div>

                <!-- Create Multa Inicio-->
                <div class="container" id="crear-multa">
                    <form action="includes/multa-create.php" method="POST">
                        <h2>Crear nueva Multa:</h2>

                        <div class="sub-wrapper" id="row1">
                            <div class="input-multa">
                                <h3>Monto $:</h3>
                                <input id="monto" name="monto" type="number">
                            </div>
                        </div>
                            <div class="input-multa">
                                <h3>Motivo:</h3>
                                <textarea name="motivo"></textarea>        
                            </div>

                            <div class="msg">                                          
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyInput"){
                                        echo "<p>Debe rellenar todas las casillas.</p>";
                                    }
                                    else if($_GET["error"] == "multaCreated"){
                                        echo "<p style='color:#0075FF;'>Multa creada exitosamente!</p>";
                                    }
                                    else if($_GET["error"] == "failedCreationMulta"){
                                        echo "<p>ERROR AL CREAR MULTA!</p>";
                                    }
                                }
                            ?>
                            </div>

                        <div class="input-multa">
                            <input type="submit" id="submit" name="submit" value="Crear Multa">
                        </div>                       
                    </form>
                </div>
                <!-- Create Multa Final-->

                <!-- Tabla Multas Inicio-->
                <div class="container" id="tabla">
                    <div class="titulo">
                        <h1>Historial de Multas</h1>
                    </div>

                    <div class="msg">                                          
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "failedToDeleteMulta"){
                                echo "<p>Error al eliminar Multa.</p>";
                            }
                            else if($_GET["error"] == "multaDeleted"){
                                echo "<p style='color:#0075FF;'>Multa eliminada exitosamente!</p>";
                            }
                        }
                    ?>
                    </div>

                    <table id="multas">
                        <tr>
                            <th>Monto</th>
                            <th>Fecha de Multa</th>
                            <th>Detalles</th>
                        </tr>
                        
                        <?php
                        require_once 'includes/functions.php';
                        require_once '../../db_access.php';
                        getMultas($conn, $_SESSION['idEmpresa']);
                        ?>
                    </table> 
                </div>  
                <!-- Tabla Multas Fin-->
            </div>
        </main>
    </body>
</html>