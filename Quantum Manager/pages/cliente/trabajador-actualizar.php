
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
        <link href="CSS/trabajador-actualizar.css" rel="stylesheet" type="text/css">
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
                    <h1 id="titulo">Actualizar Trabajador:</h1>
                </div>

                <!-- Update Trabajador Inicio-->
                <div class="container" id="actualizar-trabajador">
                    <form action="includes/trabajador-update.php" method="POST">

                        <div class="sub-wrapper" id="row1">

                            <?php
                            echo "<input name='id' id='id' type='hidden' value='". $_POST['idTrabajador']."'>";
                            ?>

                            <div class="input-trabajador">
                                <h3>RUT:</h3>
                                <?php
                                echo "<input name='rut' id='rut' type='text' value='". $_POST['rutTrabajador']."'>";
                                ?>
                            </div>


                            <div class="input-trabajador">
                                <h3>Nombre:</h3>
                                <?php
                                echo "<input name='nombre' id='nombre' type='text' value='". $_POST['nombreTrabajador']."'>";
                                ?>
                            </div>

                            <div class="input-trabajador">
                                <h3>Apellido:</h3>
                                <?php
                                echo "<input name='apellido' id='apellido' type='text' value='". $_POST['apellidoTrabajador']."'>";
                                ?>
                            </div>
                        </div>

                        <div class="sub-wrapper" id="row1">
                            <div class="input-trabajador">
                                <h3>E-mail:</h3>
                                <?php
                                echo "<input name='email' id='email' type='email' value='". $_POST['emailTrabajador']."'>";
                                ?>
                            </div>
                        </div>

                        <div class="msg">

                            
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyInput"){
                                        echo "<p>Porfavor llene todas las casillas!</p>";
                                    }
                                    else if($_GET["error"] == "failedUpdate"){
                                        echo "<p>Error al crear trabajador</p>";
                                    }
                                }
                            ?>

                            </div>


                        <div class="input-trabajador">
                            <input type="submit" name="submit" id="submit" value="Actualizar">
                        </div>

                    </form>
                </div>
                <!-- Update Trabajador Final-->

            </div>

        </main>
    </body>
</html>