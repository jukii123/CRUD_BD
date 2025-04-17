<?php
include ("../Config/Conexion.php");

$Id = $_GET['Id']; // Recibimos el parámetro sin sanitizar

// concatenación directa (mala práctica, vulnerable)
$sql = "DELETE FROM productos WHERE IdProducto = '$Id'";

$query = mysqli_query($conexion, $sql);
if ($query === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error al eliminar: " . mysqli_error($conexion);
}
?>