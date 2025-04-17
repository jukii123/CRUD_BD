<?php
include ("../Config/Conexion.php");

$Id = $_GET['Id'];

if (!is_numeric($Id)) { // debemos validar que el Id sea numérico
    die("ID inválido");
}

// Consulta preparada
$sql = "DELETE FROM productos WHERE IdProducto = ?";
$stmt = mysqli_prepare($conexion, $sql);

mysqli_stmt_bind_param($stmt, "i", $Id);

$query = mysqli_stmt_execute($stmt);

if ($query === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error al eliminar: " . mysqli_error($conexion);
}

mysqli_stmt_close($stmt);
?>