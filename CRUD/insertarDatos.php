<?php
include("../Config/Conexion.php");
include("../Config/Funciones.php");

$categoria = limpiarCadena($_POST['CategoriaP']);
$marca = limpiarCadena($_POST['MarcaP']);
$precio = limpiarCadena($_POST['Precio']);
$descripcion = limpiarCadena($_POST['descripcion']);
$nombre = limpiarCadena($_POST['nombre']);

$stmt = $conexion->prepare("INSERT INTO productos (CategoriaId, MarcaId, Precio, DescripcionProducto, Nombre) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iisss", $categoria, $marca, $precio, $descripcion, $nombre);

if ($stmt->execute()) {
    header("location:../index.php");
} else {
    echo "Datos No Insertados: " . $stmt->error;
}
?>