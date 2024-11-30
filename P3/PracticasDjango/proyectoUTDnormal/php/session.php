<?php
    //session_start();
    $entrar="";
    if ($_SERVER["REQUEST_METHOD"]=="POST")
   {

        $us=$_POST['nombre'];
        $ps=$_POST['pass'];

        include_once("db.php");

        //$sql="select * from usuarios where username='$us' and password='$ps'";

        //pass encriptado AES_ENCRYPT
         // Consulta para recuperar el correo además del username y privilegio
         $sql = "SELECT username, password, privilegio, correo FROM usuarios WHERE username='$us' AND password='$ps'";
         $ejecucion_sql = mysqli_query($conexion, $sql);
 
         if (mysqli_num_rows($ejecucion_sql)) {
             if ($fila = mysqli_fetch_assoc($ejecucion_sql)) {
                 $privilegio = $fila['privilegio'];
                 $correo = $fila['correo'];
 
                 // Iniciar sesión y guardar las variables de sesión
                 session_start();
                 $_SESSION['user'] = $us;
                 $_SESSION['privilegio'] = $privilegio;
                 $_SESSION['correo'] = $correo; // Guardar el correo en la sesión
                 $_SESSION['mensaje'] = "session";
 
                 $entrar = "acceso";
 
                 // Redirigir al índice
                 header("Location: ../index.php");
                 exit();
             }
         } else {
             $entrar = "noacceso";
         }
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
            <li><a href="session.php">Iniciar sesión</a></li>
            <li><a href="register.php">Registrarse</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Inicio de sesión</h1>
            <hr>
            <?php
            if ($entrar){
                echo '<div class="alert-warning">
                Usuario o contraseña incorrectos
                </div>';
                $entrar="";
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table align="center">
                <tr>
                    <td><label for="us">Usuario:</label></td>
                    <td><input type="text" name="nombre" id="us" autofocus required></td>
                </tr>
                <tr>
                    <td><label for="ps">Contraseña:</label></td>
                    <td><input type="password" name="pass" id="ps" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Entrar" name="entrar"></td>
                </tr>
            </table>
            </form>
       </div>
    </section>
    <footer>
    <p>PHP con geo &copy; 2024 | Visitado el: <?php echo date("d/m/y"); ?></p>
    </footer>
</body>
</html>