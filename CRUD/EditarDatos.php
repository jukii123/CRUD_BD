<?php

include_once("../Config/Conexion.php");

$id = $_POST['Id'];
$Categoria = $_POST['Categorias'];
$Marcas = $_POST['Marcas'];
$Precio = $_POST['Precio'];
$Descripcion = $_POST['Descripcion'];
$Nombre = $_POST['Nombre'];

$sql = "UPDATE productos SET 
            CategoriaId = '$Categoria',
            MarcaId = '$Marcas',
            Precio = '$Precio',
            DescripcionProducto = '$Descripcion',
            Nombre = '$Nombre'
        WHERE IdProducto = $id";

if ($conexion->query($sql)) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Error al actualizar: " . $conexion->error;
}
?>