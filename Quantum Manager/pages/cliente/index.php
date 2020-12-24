<?php
    session_start();
    require_once 'includes/functions.php';
    require_once '../../db_access.php';
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
        <link href="CSS/index.css" rel="stylesheet" type="text/css">
    </header>
    
    <body>
        <div class="background">
        </div>
        
        <?php
            require_once 'main-nav.php';
        ?>

        <main>
            <div class="wrapper">

                <div class="container">
                    <h1>Empresa: 
                        <?php
                        echo $_SESSION["nombreEmpresa"];
                        ?>
                    </h1>
                    <h3>RUT:
                    <?php
                        echo $_SESSION["rutEmpresa"];
                        ?>
                    </h3>
                </div>

                <div class="mensajes-container">
                    <h1 id="mensaje-titulo">Mensajes:</h1>
                    <?php
                    

                    getMensajesEmpresa($conn, $_SESSION['idEmpresa']);
                    ?>
                </div>


                <div class="button-container" id="button-container">
                    
                    <form action="mensaje.php">
                        <input class="button" type="submit" value="Gestionar mensajes" />
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>