<?php
// Incluir archivo de conexión a la base de datos
include('db.php');
include('session.php');

// Redirigir si el usuario ya está logueado
if (estaAutenticado()) {
    header("Location: index.php");
    exit();
}

$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Consultar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario_db = $resultado->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($password, $usuario_db['password_hash'])) {
            // Iniciar sesión
            $_SESSION['usuario'] = $usuario_db['usuario'];
            header("Location: index.php");
            exit();
        } else {
            $mensaje = "Usuario o contraseña incorrectos.";
        }
    } else {
        $mensaje = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | PHP Proyecto UTD</title>
</head>
<body>
    <header>
        <h1>Iniciar sesión</h1>
    </header>

    <section id="content">
        <div class="box">
            <form method="POST" action="login.php">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required><br><br>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required><br><br>

                <button type="submit">Iniciar sesión</button>
            </form>

            <?php if ($mensaje != "") { echo "<p>$mensaje</p>"; } ?>
        </div>
    </section>

    <footer>
        <p>PHP con geo &copy; 2024</p>
    </footer>
</body>
</html>
