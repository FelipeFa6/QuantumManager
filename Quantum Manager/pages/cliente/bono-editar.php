<?php

if(!isset($_SESSION["idEmpresa"]) || !isset($_SESSION["rutEmpresa"])){
    //Bad Case
    echo "Let's not talk about this... <br> 
    <a href = '../../index.php'><h1>Go back...</h1> </a>";

}else{ 
    $id = $_POST['idBono'];
    $nombre = $_POST['nombreBono'];
    $monto = $_POST['montoBono'];
    $descripcion = $_POST['descripcionBono'];
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
        <link href="CSS/bono-editar.css" rel="stylesheet" type="text/css">  
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
                    <a href="bono.php"><span class="fa fa-arrow-left"></span></a>
                    <h1 id="titulo">Editar bono:</h1>
                </div>
                <!-- Update Bono Inicio-->
                <div class="container" id="crear-bono">
                    <form action="includes/bono-update.php" method="POST">
                        <h2>Actualizar Bono:</h2><br>

                        <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                        <div class="sub-wrapper" id="row1">                            
                            <div class="input-bono">
                                <h3>Nombre:</h3>
                                <input id="nombre" name="nombre" type="text" value="<?php echo $nombre;?>">
                            </div>
                            <div class="input-bono">
                                <h3>Monto:</h3>
                                <input id="monto" name="monto" type="number">
                            </div>
                        </div>
                            <div class="input-bono">
                                <h3>Descripcion:</h3>
                                <textarea name="descripcion" id="descripcion"><?php echo $descripcion;?></textarea>
                            </div>

                        <div class="input-bono">
                            <input type="submit" id="submit" name="submit" value="Actualizar bono">
                        </div>                       
                    </form>
                </div>
                <!-- Update Bono Final-->
            </div>
        </main>
    </body>
</html>