<?php
$conexion = mysqli_connect("localhost", "root", "", "blog_db");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['contenido']);

    $sql = "UPDATE posts SET titulo='$titulo', contenido='$contenido' WHERE id=$id";

    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
} else {
    echo "Acceso no permitido.";
}
