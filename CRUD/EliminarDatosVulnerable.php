<?php
include ("../Config/Conexion.php");

// Versión deliberadamente vulnerable (con fines de demostración)
$Id = $_GET['Id']; // Recibimos el parámetro sin sanitizar

// Consulta vulnerable - concatenación directa
$sql = "DELETE FROM productos WHERE IdProducto = '$Id'";

$query = mysqli_query($conexion, $sql);
if ($query === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error al eliminar: " . mysqli_error($conexion);
}
?>