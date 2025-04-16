<?php
include_once("../Config/Conexion.php");
include("../Config/Funciones.php");

$id = limpiarCadena($_POST['Id']);
$Categoria = limpiarCadena($_POST['Categorias']);
$Marcas = limpiarCadena($_POST['Marcas']);
$Precio = limpiarCadena($_POST['Precio']);
$Descripcion = limpiarCadena($_POST['Descripcion']);
$Nombre = limpiarCadena($_POST['Nombre']);

$stmt = $conexion->prepare("UPDATE productos SET CategoriaId = ?, MarcaId = ?, Precio = ?, DescripcionProducto = ?, Nombre = ? WHERE IdProducto = ?");
$stmt->bind_param("iisssi", $Categoria, $Marcas, $Precio, $Descripcion, $Nombre, $id);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Error al actualizar: " . $stmt->error;
}
?>