<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Editar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <h1 class="text-center" style="background-color: black; color:white">EDITAR PRODUCTOS</h1>

    <br>
    <form class="container">

        <?php
        include_once("../Config/Conexion.php");

        $sql = "SELECT * FROM productos WHERE IdProducto = " . $_REQUEST['Id'];
        $resultado = $conexion->query($sql);
        $row = $resultado->fetch_assoc();
        ?>

        <!--TRAER DATOS CATEGORIA-->
        <label>Categorías</label>
        <select class="form-select mb-3" name="CategoriaId">
            <option disabled>--Seleccione Categoría--</option>
            <?php
            $sql1 = "SELECT * FROM categorias WHERE Id = " . $row['CategoriaId'];
            $resultado1 = $conexion->query($sql1);
            $row1 = $resultado1->fetch_assoc();
            echo '<option selected value="' . $row1['Id'] . '">' . $row1['NombreCategoria'] . '</option>';

            $sql2 = "SELECT * FROM categorias WHERE Id != " . $row['CategoriaId'];
            $resultado2 = $conexion->query($sql2);
            while ($fila = $resultado2->fetch_array()) {
                echo '<option value="' . $fila['Id'] . '">' . $fila['NombreCategoria'] . '</option>';
            }
            ?>
        </select>

        <!--TRAER DATOS MARCA-->
        <label>Marcas</label>
        <select class="form-select mb-3" name="MarcaId">
            <option disabled>--Seleccione Marca--</option>
            <?php
            $sql3 = "SELECT * FROM marcas WHERE Id = " . $row['MarcaId'];
            $resultado3 = $conexion->query($sql3);
            $row3 = $resultado3->fetch_assoc();
            echo '<option selected value="' . $row3['Id'] . '">' . $row3['NombreMarca'] . '</option>';

            $sql4 = "SELECT * FROM marcas WHERE Id != " . $row['MarcaId'];
            $resultado4 = $conexion->query($sql4);
            while ($fila = $resultado4->fetch_array()) {
                echo '<option value="' . $fila['Id'] . '">' . $fila['NombreMarca'] . '</option>';
            }
            ?>
        </select>

        <div class="form-group">
            <label>Precio</label>
            <input type="text" class="form-control" name="Precio" value="<?php echo $row['Precio'] ?>">
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <input type="text" class="form-control" name="Descripcion" value="<?php echo $row['DescripcionProducto'] ?>">
        </div>

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="Nombre" value="<?php echo $row['Nombre'] ?>">
        </div>

        <input type="hidden" name="IdProducto" value="<?php echo $row['IdProducto'] ?>">

        <div class="text-center">
            <br>
            <button type="submit" class="btn btn-danger">Guardar cambios</button>
            <a href="../index.php" class="btn btn-dark">Cancelar</a>
        </div>

    </form>
</body>
</html>
