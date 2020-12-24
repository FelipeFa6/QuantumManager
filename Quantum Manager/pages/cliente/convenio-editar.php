<?php

    $id = $_POST['idConvenio'];
    $nombre = $_POST['nombreConvenio'];
    $monto = $_POST['montoConvenio'];
    $descripcion = $_POST['descripcionConvenio'];
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

        <link href="CSS/convenio-actualizar.css" rel="stylesheet" type="text/css">
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
                    <a href="convenio.php"><span class="fa fa-arrow-left"></span></a>
                    <h1 id="titulo">Actualizar Convenio:</h1>
                </div>

                <!-- Update Convenio Inicio-->
                <div class="container" id="actualizar-convenio">
                    <form action="includes/convenio-update.php" method="POST">

                        <input id="id" name="id" type="hidden" value="<?php echo $id;?>">

                        <div class="container" id="actualizar-convenio">
                            <div class="sub-wrapper" id="row1">
                                <div class="input-convenio">
                                    <h3>Nombre:</h3>
                                    <input id="nombre" name="nombre" type="text" value="<?php echo $nombre;?>">
                                </div>
    
    
                                <div class="input-convenio">
                                    <h3>Costo:</h3>
                                    <input id="monto" name="monto" type="text" value="<?php echo $monto;?>">
                                </div>
                            </div>
                            
                            <textarea class="descripcion" name="descripcion"><?php echo $descripcion;?> </textarea>

                            <div class="input-convenio">
                                <input type="submit" id="submit" name="submit" value="Actualizar Convenio">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Update Convenio Final-->
            </div>
        </main>
    </body>
</html>