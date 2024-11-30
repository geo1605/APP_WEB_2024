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
           <h1>Vision</h1>
           <hr>
           <p>Mi visión es ser un líder en el desarrollo de soluciones web usando PHP, destacándome por crear aplicaciones escalables y sostenibles que impulsen el avance tecnológico. Busco transformar ideas en plataformas digitales efectivas que conecten a las personas y faciliten el acceso a la información, mientras contribuyo al crecimiento y evolución de la comunidad de desarrolladores mediante la colaboración y el intercambio de conocimientos.</p>
       </div>
    </section>
    <footer>
        <p>Curso de PHP con geo &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>