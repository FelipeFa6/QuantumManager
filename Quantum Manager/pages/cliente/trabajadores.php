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

        <link href="CSS/trabajadores.css" rel="stylesheet" type="text/css">
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
                    <h1 id="titulo">Administrar Trabajadores:</h1>
                </div>

                <!-- Create Trabajador Inicio-->
                <div class="container" id="create-trabajador">

                    <h2>Agregar un nuevo trabajador:</h2>
                    

                    <form action="includes/trabajador-create.php" method="POST">

                        <div class="container" id="actualizar-trabajador">
                            <div class="sub-wrapper" id="row1">
                                <div class="input-trabajador">
                                    <h3>RUT:</h3>
                                    <input id="rut" name="rut" type="text" placeholder="RUT trabajador...">
                                </div>
    
    
                                <div class="input-trabajador">
                                    <h3>Nombre:</h3>
                                    <input id="nombre" name="nombre" type="text" placeholder="Nombre trabajador...">
                                </div>
    
                                <div class="input-trabajador">
                                    <h3>Apellido:</h3>
                                    <input id="apellido" name="apellido" type="text" placeholder="Apellido trabajador...">
                                </div>

                                
                            </div>

                            <div class="input-trabajador">
                                    <h3>E-mail:</h3>
                                    <input id="email" name="email" type="email" placeholder="E-mail">
                            </div>

                            <div class="msg">

                            
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyInput"){
                                        echo "<p>Porfavor llene todas las casillas!</p>";
                                    }
                                    else if($_GET["error"] == "failedCreation"){
                                        echo "<p>Error al crear trabajador</p>";
                                    }
                                    else if($_GET["error"] == "rutExists"){
                                        echo "<p>El RUT ingresado ya existe</p>";
                                    }
                                    else if($_GET["error"] == "trabajadorCreate"){
                                        echo "<p style='color:#0075FF;'>Trabajador creado exitosamente</p>";
                                    }
                                }
                            ?>

                            </div>

                            <div class="input-trabajador">
                                <input type="submit" name="submit" id="submit" value="Crear">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Create Trabajador Final-->

                <!-- Tabla Trabajadores Inicio-->
                <div class="container" id="tabla">
                    <h1>Lista de trabajadores:</h1>
                    <div class="msg">                                          
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "failedToDeleteTrabajador"){
                                echo "<p>Error al eliminar trabajador!</p>";
                            }
                            else if($_GET["error"] ==  "updateEmptyInput"){
                                echo "<p>Al actualizar debe rellenar todas las casillas</p>";
                            }

                            else if($_GET["error"] == "trabajadorDeleted"){
                                echo "<p style='color:#0075FF;'>Trabajador eliminado</p>";
                            }
                            else if($_GET["error"] ==  "trabajadorUpdated"){
                                echo "<p style='color:#0075FF;'>Trabajador Actualizado</p>";
                            }
                            
                        }
                    ?>
                    </div>

                    <table>
                        <tr>
                            <th>RUT</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>E-mail</th>
                        </tr>
                        <tr>
                            <?php
                                require_once 'includes/functions.php';
                                require_once '../../db_access.php';
                                getTrabajadores($conn, $_SESSION['idEmpresa']);
                            ?>
                    </table> 

                    

                </div>
                <!-- Tabla Trabajadores Final-->
            </div>
        </main>
    </body>
</html>