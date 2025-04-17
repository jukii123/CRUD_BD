<?php

    include_once("../Config/Conexion.php");

    $id = $_POST['Id'];
    $Categoria = $_POST['Categorias'];
    $Marcas = $_POST['Marcas'];
    $Precio = $_POST['Precio'];
    $Descripcion = $_POST['Descripcion'];
    $Nombre = $_POST['Nombre'];

    $sql = "UPDATE productos SET 
                    CategoriaId='".$Categoria."',
                    MarcaId='".$Marcas."',
                    Precio='".$Precio."',
                    DescripcionProducto='".$Descripcion."',
                    Nombre='".$Nombre."' WHERE IdProducto =".$id."";

    if ($resultado = $conexion->query($sql)) {
        header("location:../index.php");
    } else {
        echo "<h3 style='color: red; text-align: center;'>Error al actualizar el producto.</h3>";
        echo "<p style='text-align: center;'>".$conexion->error."</p>";
    }
?>
