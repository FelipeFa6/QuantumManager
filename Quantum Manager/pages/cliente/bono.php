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
        <link href="CSS/bono.css" rel="stylesheet" type="text/css">  
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
                    <h1 id="titulo">Gestion de Bonos:</h1>
                </div>
                <!-- Create Bono Inicio-->
                <div class="container" id="crear-bono">
                    <form action="includes/bono-create.php" method="POST">
                        <h2>Crear Bono:</h2><br>

                        <div class="sub-wrapper" id="row1">                            
                            <div class="input-bono">
                                <h3>Nombre:</h3>
                                <input id="nombre" name="nombre" type="text" value=" ">
                            </div>
                            <div class="input-bono">
                                <h3>Monto:</h3>
                                <input id="monto" name="monto" type="number">
                            </div>
                        </div>
                            <div class="input-bono">
                                <h3>Descripcion:</h3>
                                <textarea name="descripcion" name="descripcion"></textarea>        
                            </div>

                            <div class="msg">                                          
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyInput"){
                                        echo "<p>Debe rellenar todas las casillas.</p>";
                                    }
                                    else if($_GET["error"] == "bonoCreated"){
                                        echo "<p style='color:#0075FF;'>Bono creado exitosamente!</p>";
                                    }
                                    else if($_GET["error"] == "bonoUpdated"){
                                        echo "<p style='color:#0075FF;'>Bono actualizado exitosamente!</p>";
                                    }
                                    else if($_GET["error"] == "failedUpdate"){
                                        echo "<p>ERROR AL ACTUALIZAR!</p>";
                                    }
                                }
                            ?>
                            </div>

                        <div class="input-bono">
                            <input type="submit" id="submit" name="submit" value="Crear Bono">
                        </div>                       
                    </form>
                </div>
                <!-- Create Bono Final-->

                <!-- Tabla Bonos Inicio-->
                <div class="container" id="tabla">
                    <div class="titulo">
                        <h1>Bonos</h1>
                        <p>Lista de bonos existentes</p>
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

                    <table id="bonos">
                        <tr>
                            <th>Nombre</th>
                            <th>Monto en CLP</th>
                            <th>Descripcion</th>
                        </tr>
                        
                        <?php
                        require_once 'includes/functions.php';
                        require_once '../../db_access.php';
                        getBonos($conn, $_SESSION['idEmpresa']);
                        ?>
                    </table> 
                </div>  
                <!-- Tabla Bonos Fin-->
            </div>
        </main>
    </body>
</html>