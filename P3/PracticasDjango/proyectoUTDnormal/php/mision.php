<?php
session_start();
            if (isset($_SESSION['user'])) {
                
            } else {
                header("Location: ../index.php");
                exit();
            }
            ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Inicio|PHP Proyecto UTD
    </title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen Django" title="Django">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
                <li><a href="../index.php" >Inicio</a></li>
                <li><a href="mision.php">Mision</a></li>
                <li><a href="vision.php">Vision</a></li>
                <li><a href="acercade.php">Acerca de</a></li>
                <li><a href="mostrar_articulos.php">Articulos</a></li>
                <li><a href="mostrar_categorias.php">Categorias</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Mision</h1>
            <hr>
            <p>Mi misión es desarrollar aplicaciones web robustas, eficientes y seguras utilizando PHP, con el objetivo de proporcionar soluciones digitales innovadoras que faciliten la interacción y mejoren la productividad de los usuarios. A través del constante aprendizaje y la implementación de las mejores prácticas de programación, busco crear herramientas accesibles que resuelvan problemas reales y ayuden a las personas a optimizar sus procesos diarios.</p>
       </div>
    </section>
    <footer>
        <p>Curso de PHP con geo &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>