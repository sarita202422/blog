<?php
$conexion = new mysqli("localhost", "root", "", "blog_db");

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$resultado = mysqli_query($conexion, $sql);
$post = mysqli_fetch_assoc($resultado);

if ($post) {
    echo "<h2>" . $post['titulo'] . "</h2>";
    echo "<p>" . $post['contenido'] . "</p>";
} else {
    echo "Publicación no encontrada.";
}
?>
