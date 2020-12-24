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
        <link href="CSS/signup.css" rel="stylesheet" type="text/css">
        
        <!-- Script -->
        <script src="../../jQuery/jquery-3.5.1.min.js"></script>
    </header>
    <body>
        <div class="background">
        </div>

        <main>
                <h1 id="title">Quantum Manager</h1>
                    
                <div class="logo-container">
                    <img id="logo" src="img/Logo/Tesseract-logo.png">
                </div>

                <!-- Create Empresa Inicio-->
                <div class="container" id="crear-empresa">
                
                    <form action="./includes/signup.php" method="POST">

                        <div class="sub-wrapper" id="row1">

                            <div class="input-empresa">
                                <h3>RUT Empresa:</h3>
                                <input class="input" id="rut" name="rut" type="text" placeholder="RUT empresa...">
                            </div>

                            <div class="input-empresa">
                                <h3>Nombre Empresa:</h3>
                                <input class="input" id="nombre" name="nombre" type="text" placeholder="Nombre empresa...">
                            </div>
                            
                        </div>

                        <div class="sub-wrapper" id="row1">
                            <div class="input-empresa">
                                <h3>Contraseña:</h3>
                                <input class="input" id="passwd" name="passwd" type="password" placeholder="*********">
                            </div>

                            <div class="input-empresa">
                                <h3>Confirmar Contraseña:</h3>
                                <input class="input" id="passwdConf" name="passwdConf" type="password" placeholder="*********">
                            </div>

                        </div>

                        <div class="sub-wrapper" id="row2">
                            <div class="input-empresa">
                                <h3>Direccion:</h3>
                                <input class="input" id="direccion" name="direccion" type="text" placeholder="Direccion empresa...">
                            </div>
                        </div>

                        <div class="msg">
                        <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"] == "emptyInput"){
                                    echo "<p>Porfavor llene todas las casillas!</p>";
                                }
                                else if($_GET["error"] == "passwdMatch"){
                                    echo "<p>Las contraseñas no coinciden!</p>";
                                }
                                else if($_GET["error"] == "rutExists"){
                                    echo "<p>El RUT ingresado ya existe!</p>";
                                }
                                else if($_GET["error"] == "none"){
                                    echo "<p>Cuenta creada exitosamente!</p>";
                                }
                            }
                        ?>
                        </div>


                        <input class="input" id="submit" type="submit" value="Ingresar" name="submit">
                    </form>

                    <a href="ingresar.php"><input class="input" id="volver" type="button" value="Volver"></a>
                </div>
                <!-- Create Trabajador Final-->

        </main>
    </body>
</html>