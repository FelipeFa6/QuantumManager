<?php
    session_start();

?>

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
</header>


<div class="navbar">
    <div class="inner__header">
        
        <div class="logo__container">
            <a href="index.php"><img id="logo" src="img/Logo/Tesseract-logo.png"></a>
        </div>
        
        <ul class="navigation">
            <a href="ayuda.php"><li>Ayuda</li></a>
            
            <a href="planes.php"><li>Planes</li></a>
            
            <a href="#"><li>Soporte</li></a>
            

            <?php
            if(isset($_SESSION["idEmpresa"])){
                echo '<a href="../cliente/index.php"><li>Mi Cuenta<span class="fa fa-user"></span></li></a>';
            }else{
                echo '<a href="ingresar.php"><li>Ingresar</li></a>';
            }
            ?>
        </ul>
    </div>
</header>