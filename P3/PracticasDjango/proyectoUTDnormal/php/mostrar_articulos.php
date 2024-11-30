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

// Verificar si el formulario fue enviado para agregar un artículo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $url = $_POST['url'];

    // Consulta para insertar el artículo en la base de datos
    $sql = "INSERT INTO articulos (descripcion, id_categoria, url) VALUES ('$descripcion', '$categoria', '$url')";
    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la misma página para ver el artículo recién agregado
        header("Location: mostrar_articulos.php");
        exit();
    } else {
        echo "Error al guardar el artículo: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos | PHP Proyecto UTD</title>
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
            <li><a href="mostrar_articulos.php">Artículos</a></li>
            <li><a href="mostrar_categorias.php">Categorías</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </nav>

    <section id="content">
        <div class="box">
            <h1>Mostrar artículos</h1>

            <!-- Botón para añadir artículo -->
            <a href="#formulario" class="btn btn-primary">Añadir Artículo</a>

            <!-- Formulario de añadir artículo (incluso si el formulario está en el mismo archivo) -->
            <div id="formulario" style="display: none;">
                <h2>Añadir Nuevo Artículo</h2>
                <form action="mostrar_articulos.php" method="POST">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select name="categoria" id="categoria" class="form-control" required>
                            <?php
                            // Cargar categorías de la base de datos
                            $sql_categoria = "SELECT id, descripcion FROM categorias";
                            $resultado_categoria = $conexion->query($sql_categoria);
                            while ($row = $resultado_categoria->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Guardar Artículo</button>
                </form>
            </div>

            <hr>

            <?php
            // Mostrar artículos desde la base de datos
            $sql_articulos = "SELECT 
                    articulos.id, 
                    articulos.descripcion AS articulo, 
                    articulos.url,
                    categorias.descripcion AS categoria 
                  FROM articulos 
                  INNER JOIN categorias 
                  ON articulos.id_categoria = categorias.id";

            $ejecucion_sql = $conexion->query($sql_articulos);

            // Verificar si hay resultados
            if ($ejecucion_sql->num_rows > 0) {
                echo '<table border="1">';
                echo '<tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>url</th>

                    </tr>';

                while ($fila = $ejecucion_sql->fetch_assoc()) {
                    echo '<tr>
                            <td>' . htmlspecialchars($fila['id']) . '</td>
                            <td>' . htmlspecialchars($fila['articulo']) . '</td>
                            <td>' . htmlspecialchars($fila['categoria']) . '</td>
                            <td> <img  src="' . htmlspecialchars($fila['url']) . '"></td>
                        </tr>';
                }

                echo '</table>';
            } else {
                echo 'No hay artículos disponibles.';
            }
            ?>
        </div>
    </section>

    <footer>
        <p>Curso de PHP con geo &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>

    <!-- Script para mostrar el formulario cuando se haga clic en el botón Añadir Artículo -->
    <script>
        document.querySelector('.btn-primary').addEventListener('click', function() {
            document.getElementById('formulario').style.display = 'block';
        });
    </script>

</body>
</html>
