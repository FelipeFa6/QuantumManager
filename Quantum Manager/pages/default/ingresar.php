<html>
    <header>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Quantum Manager</title>
        
        <!-- 
        NOTE: The fonts will be independently 'imported' in the .CSS files
        -->
        
        <!-- CSS -->
        <link href="../../fonts/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="CSS/Essentials/header.css" rel="stylesheet" type="text/css">
        <link href="CSS/Essentials/footer.css" rel="stylesheet" type="text/css">
        <link href="CSS/ingresar.css" rel="stylesheet" type="text/css">
        <!-- Script -->
    </header>

    <body>

        <?php
            require_once 'main-nav.php';
        ?>

        <main>
            <div class="instrucciones">
                    <h1>Quantum Manager:</h1>
                    <div class="wrapper">a
                    
                        <div class="container">
                            <a href="form-signup.php"><h1>No tengo cuenta<span class="fa fa-user"></span></h1></a>
                        </div>
                        
                        <div class="container">
                            <a href="form-login.php"><h1>Si tengo cuenta<span class="fa fa-sign-in"></span></h1></a>
                            
                        </div>
                        
                    </div>
                </div>
        </main>
        
        
        <footer>
            <div id="left-footer">
                <a href="#"><h1>Quantum Manager</h1></a>
                <p>Ubicacion: <span>Vitacura, Calle Falsa 123</span></p>
                <p>Correo: &emsp;&emsp;<span>QuantumComponents@gmail.com</span></p>
                <p>Telefono: &emsp;<span>+569 1234 5678</span></p>
            </div>


            <div id="center-footer">
                <p>Quienes somos:</p>

                <ul>
                    <a href="#"><li>Nuestros valores</li></a>

                    <a href="#"><li>Terminos y condiciones</li></a>

                    <a href="#"><li>Politicas de privacidad</li></a>
                </ul>
            </div>
        </footer>
    </body>
</html>