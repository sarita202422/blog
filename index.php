<!DOCTYPE html>
<!--pagina principal donde se visualizaran los posts al crearlos-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Blog</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <h1>Mi Blog Personal</h1>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="formulario.php">Crear publicación</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>

    </header>

    <main>
        <!-- Sección para mostrar los posts -->
        <section id="posts">
<?php
$conexion = mysqli_connect("localhost", "root", "", "blog_db");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consultar los posts
$sql = "SELECT * FROM posts ORDER BY fecha DESC";
$resultado = mysqli_query($conexion, $sql);

// Mostrar los posts
if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<article>";
        echo "<h3>" . htmlspecialchars($row['titulo']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($row['contenido'])) . "</p>";
        echo "<small>Publicado el " . $row['fecha'] . "</small>";
        echo "</article>";
    }
} else {
    echo "<p>No hay publicaciones aún.</p>";
}

mysqli_close($conexion);
?>
    </main>
    
    <footer id="contacto">
    <div class="footer-contacto">
        <h3>Contáctame</h3>
        <p>Correo: smarinao2024@alu.uct.cl</p>
        <p>Teléfono: +56 9 1122 3344</p>
        <p>Dirección: av. alegria 1234</p>
    </div>
    <div class="footer-derechos">
        <p>© 2025 Sarita Marinao - Todos los derechos reservados.</p>
    </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>

</html>