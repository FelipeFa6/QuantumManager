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
        <link href="CSS/Convenio.css" rel="stylesheet" type="text/css">
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
                    <h1 id="titulo">Administrar Convenios:</h1>
                </div>

                <!-- Create Convenio Inicio-->
                <div class="container" id="crear-Convenio">
                    <form action="includes/convenio-create.php" method="POST">
                        <h2>Crear Convenio:</h2><br>

                        <div class="sub-wrapper" id="row1">                            
                            <div class="input-Convenio">
                                <h3>Nombre:</h3>
                                <input id="nombre" name="nombre" type="text" value=" ">
                            </div>
                            <div class="input-Convenio">
                                <h3>Monto:</h3>
                                <input id="monto" name="monto" type="number">
                            </div>
                        </div>
                            <div class="input-Convenio">
                                <h3>Descripcion:</h3>
                                <textarea name="descripcion" name="descripcion"></textarea>        
                            </div>

                            <div class="msg">                                          
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyInput"){
                                        echo "<p>Debe rellenar todas las casillas.</p>";
                                    }
                                    else if($_GET["error"] == "failedConvenioCreation"){
                                        echo "<p>ERROR AL CREAR CONVENIO!</p>";
                                    }
                                    else if($_GET["error"] == "convenioCreated"){
                                        echo "<p style='color:#0075FF;'>Convenio creado exitosamente!</p>";
                                    }
                                    else if($_GET["error"] == "convenioUpdate"){
                                        echo "<p style='color:#0075FF;'>Convenio Actualizado exitosamente!</p>";
                                    }
                                }
                            ?>
                            </div>

                        <div class="input-Convenio">
                            <input type="submit" id="submit" name="submit" value="Crear Convenio">
                        </div>                       
                    </form>
                </div>
                <!-- Create Convenio Final-->

                <!-- Tabla Convenio Inicio-->
                <div class="container" id="tabla">
                    <h1>Lista de Convenios:</h1>

                    <div class="msg">                                          
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "failedToDeleteConvenio"){
                                echo "<p>ERROR AL ELIMINAR CONVENIO!</p>";
                            }
                        }
                    ?>
                    </div>

                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>Monto</th>
                            <th>Descripcion</th>
                            <th>Fecha creacion</th>
                        </tr>
                        
                        <?php
                        require_once 'includes/functions.php';
                        require_once '../../db_access.php';
                        getConvenios($conn, $_SESSION['idEmpresa']);
                        ?>
                    </table> 

                </div>
                <!-- Tabla Convenio Final-->

            </div>
        </main>
    </body>
</html>