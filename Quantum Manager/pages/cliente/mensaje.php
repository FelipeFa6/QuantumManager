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
        <link href="CSS/mensaje.css" rel="stylesheet" type="text/css">  
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
                    <a href="index.php"><span class="fa fa-arrow-left"></span></a>
                    <h1 id="titulo">Gestion de mensajes:</h1>
                </div>
                <!-- Create Mensaje Inicio-->
                <div class="container" id="crear-mensaje">
                    <form action="includes/mensaje-create.php" method="POST">
                        <h2>Crear Mensaje:</h2><br>

                        <div class="sub-wrapper" id="row1">                            
                            <div class="input-mensaje">
                                <h3>Titulo:</h3>
                                <input id="titulo" name="titulo" type="text">
                            </div>
                        </div>
                            <div class="input-mensaje">
                                <h3>Descripcion:</h3>
                                <textarea name="descripcion" id="name"></textarea>        
                            </div>

                            <div class="msg">                                          
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyInput"){
                                        echo "<p>Debe rellenar todas las casillas.</p>";
                                    }
                                    else if($_GET["error"] == "mensajeCreated"){
                                        echo "<p style='color:#0075FF;'>Mensaje creado exitosamente!</p>";
                                    }
                                }
                            ?>
                            </div>

                        <div class="input-mensaje">
                            <input type="submit" id="submit" name="submit" value="Crear mensaje">
                        </div>                       
                    </form>
                </div>
                <!-- Create Mensaje Final-->

                <!-- Tabla Mensajes Inicio-->
                <div class="container" id="tabla">
                    <div class="titulo">
                        <h1>Mensajes</h1>
                        <p>Lista de mensajes existentes</p>
                    </div>

                    <div class="msg">                                          
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "failedToDeleteMensaje"){
                                echo "<p>Error al eliminar mensaje.</p>";
                            }
                            else if($_GET["error"] == "mensajeDeleted"){
                                echo "<p style='color:#0075FF;'>Mensaje eliminado exitosamente!</p>";
                            }
                        }
                    ?>
                    </div>

                    <table id="mensaje">
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                        </tr>
                        
                        <?php
                        require_once 'includes/functions.php';
                        require_once '../../db_access.php';
                        getMensajes($conn, $_SESSION['idEmpresa']);
                        ?>
                    </table> 
                </div>  
                <!-- Tabla Mensajes Fin-->
            </div>
        </main>
    </body>
</html>