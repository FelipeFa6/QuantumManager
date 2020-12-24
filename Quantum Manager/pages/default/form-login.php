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
        <link href="./CSS/login.css" rel="stylesheet" type="text/css">
        
        <!-- Script -->
        <script src="../../jQuery/jquery-3.5.1.min.js"></script>
    </header>
    <body>
        <div class="background">
        </div>

        <main>
                <h1 id="title">Quantum Manager</h1>
                    
                <div class="logo-container">
                    <img id="logo" src="./img/Logo/Tesseract-logo.png">
                </div>

                <!-- Ingresar a Empresa Inicio-->
                <div class="container" id="login-box">

                        <div class="msg">
                        <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"] == "emptyInput"){
                                    echo "<p>Porfavor llene todas las casillas!</p>";
                                }
                                else if($_GET["error"] == "userCreated"){
                                    echo "<p>Cuenta creada exitosamente!</p>";
                                }
                                else if($_GET["error"] == "rutDoesNotExist"){
                                    echo "<p>El RUT no existe</p>";
                                }
                                else if($_GET["error"] == "wrongLogin"){
                                    echo "<p>Contraseña incorrecta</p>";
                                }
                            }
                        ?>
                        </div>

                    <form action="./includes/login.php" method="POST">

                        <div class="sub-wrapper">
                            <div class="input-login">
                                <h3>RUT Empresa:</h3>
                                <input class="input" id="rut" name="rut" type="text" placeholder="RUT empresa...">
                            </div>

                        </div>

                        <div class="sub-wrapper">
                            <div class="input-login">
                                <h3>Contraseña:</h3>
                                <input class="input" id="passwd" name="passwd" type="password" placeholder="*********">
                            </div>
                        </div>

                        <input class="input" id="submit" type="submit" value="Ingresar" name="submit">
                    </form>

                    <a href="ingresar.php"><input class="input" id="volver" type="button" value="Volver"></a>
                </div>
                <!-- Ingresar a Empresa Final-->

        </main>
    </body>
</html>