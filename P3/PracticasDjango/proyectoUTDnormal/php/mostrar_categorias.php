<?php
session_start();
if (isset($_SESSION['user'])) {
    // Usuario autenticado
} else {
    header("Location: ../index.php");
    exit();
}

// Incluir conexión a la base de datos
include_once('db.php');

// Verificar si el formulario fue enviado para agregar una categoría
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $descripcion = $_POST['descripcion'];

    // Consulta para insertar la categoría en la base de datos
    $sql = "INSERT INTO categorias (descripcion) VALUES ('$descripcion')";
    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la misma página para ver la categoría recién agregada
        header("Location: mostrar_categorias.php");
        exit();
    } else {
        echo "Error al guardar la categoría: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías | PHP Proyecto UTD</title>
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
            <li><a href="../index.php">Inicio</a></li>
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
            <h1>Mostrar Categorías</h1>

            <!-- Botón para añadir nueva categoría -->
            <a href="#formulario" class="btn btn-primary">Añadir Categoría</a>

            <!-- Formulario de añadir categoría (incluso si el formulario está en el mismo archivo) -->
            <div id="formulario" style="display: none;">
                <h2>Añadir Nueva Categoría</h2>
                <form action="mostrar_categorias.php" method="POST">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <button type="submit" class="btn btn-success">Guardar Categoría</button>
                </form>
            </div>

            <hr>

            <?php
            // Consulta para obtener las categorías de la base de datos
            $sql_categoria = "SELECT id, descripcion FROM categorias";
            $ejecucion_sql = $conexion->query($sql_categoria);

            // Verificar si hay resultados
            if ($ejecucion_sql->num_rows > 0) {
                echo '<table style="with:100%" border="1">';
                echo '<tr>
                        <th>ID</th>
                        <th>Descripción</th>
                    </tr>';

                while ($fila = $ejecucion_sql->fetch_assoc()) {
                    echo '<tr>
                            <td>' . htmlspecialchars($fila['id']) . '</td>
                            <td>' . htmlspecialchars($fila['descripcion']) . '</td>
                        </tr>';
                }

                echo '</table>';
            } else {
                echo 'No hay categorías disponibles.';
            }
            ?>
        </div>
    </section>

    <footer>
        <p>Curso de PHP con geo &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>

    <!-- Script para mostrar el formulario cuando se haga clic en el botón Añadir Categoría -->
    <script>
        document.querySelector('.btn-primary').addEventListener('click', function() {
            document.getElementById('formulario').style.display = 'block';
        });
    </script>

</body>
</html>
