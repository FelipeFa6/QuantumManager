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
        <link href="CSS/fondos.css" rel="stylesheet" type="text/css">
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
                    <h1 id="titulo">Administrar Fondos:</h1>
                </div>


                <!-- Opciones fondos Inicio-->
                <h2>Seleccione una opcion:</h2>
                    <div class="container" id="opciones">
                            <div class="input-fondo">
                                <a href="venta.php"><input class="button" type="submit" value="Venta"></a>
                            </div>
                            <div class="input-fondo">
                                <a href="compra.php"><input class="button" type="submit" value="Compra"></a>
                            </div>
                            <div class="input-fondo">
                                <a href= "impuesto.php"><input class="button" type="submit" value="Impuesto"></a>
                            </div>
                            <div class="input-trabajador">
                                <a href= "multa.php"><input class="button" type="submit" value="Multa"></a>
                            </div>
                    </div>
            </div>
                <!-- Opciones Fondos Final-->

        </main>
    </body>
</html>