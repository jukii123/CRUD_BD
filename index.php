<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="container">
        <h1 class="text-center" style="background-color: black; color:white">LISTADO DE PRODUCTOS</h1>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                require("Config/Conexion.php");
                $sql = $conexion->query("SELECT * FROM productos
                    INNER JOIN categorias on productos.CategoriaId = categorias.id
                    INNER JOIN marcas on productos.MarcaId = marcas.id
                    ");
                ?>
                <?php
                while ($resultado = $sql->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $resultado['IdProducto'] ?></td>
                        <td><?php echo $resultado['NombreCategoria'] ?></td>
                        <td><?php echo $resultado['NombreMarca'] ?></td>
                        <td><?php echo $resultado['Precio'] ?></td>
                        <td><?php echo $resultado['DescripcionProducto'] ?></td>
                        <td><?php echo $resultado['Nombre'] ?></td>
                        <td>
                            <a href="Formularios/EditarForm.php?Id=<?php echo $resultado['IdProducto'] ?>"
                                class="btn btn-warning">Editar</a>

                                <!-- Versión vulnerable -->
                                <a href="#" 
                                class="btn btn-danger delete-btn" 
                                data-id="<?php echo $resultado['IdProducto'] ?>">Eliminar (Vulnerable)</a>

                                <!-- Versión segura -->
                                <a href="#" 
                                class="btn btn-success delete-seguro-btn" 
                                data-id="<?php echo $resultado['IdProducto'] ?>">Eliminar (Seguro)</a>
                        </td>

                    </tr>
                    <?php
                }
                ?>



            </tbody>
        </table>
        <div class="container">
            <a href="Formularios/AgregarForm.php" class="btn btn-warning btn-sm">Agregar Producto</a>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>

    <!-- Modal para versión vulnerable -->
    <div class="modal fade" id="confirmDeleteModalVulnerable" tabindex="-1" aria-labelledby="confirmDeleteModalLabelVulnerable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="confirmDeleteModalLabelVulnerable">Confirmar Eliminación (Vulnerable)</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ¿Estás seguro de que deseas eliminar este producto? (Versión vulnerable)
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a id="confirmDeleteButtonVulnerable" class="btn btn-danger">Eliminar</a>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal para versión segura -->
    <div class="modal fade" id="confirmDeleteModalSeguro" tabindex="-1" aria-labelledby="confirmDeleteModalLabelSeguro" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="confirmDeleteModalLabelSeguro">Confirmar Eliminación (Segura)</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ¿Estás seguro de que deseas eliminar este producto? (Versión segura)
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a id="confirmDeleteButtonSeguro" class="btn btn-success">Eliminar</a>
        </div>
        </div>
    </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Configuración para versión vulnerable
    const deleteButtons = document.querySelectorAll('.delete-btn');
    const confirmDeleteModalVulnerable = new bootstrap.Modal(document.getElementById('confirmDeleteModalVulnerable'));
    const confirmDeleteButtonVulnerable = document.getElementById('confirmDeleteButtonVulnerable');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-id');
            
            confirmDeleteButtonVulnerable.href = `CRUD/EliminarDatosVulnerable.php?Id=${productId}`;
            confirmDeleteModalVulnerable.show();
        });
    });

    // Configuración para versión segura
    const deleteSeguroButtons = document.querySelectorAll('.delete-seguro-btn');
    const confirmDeleteModalSeguro = new bootstrap.Modal(document.getElementById('confirmDeleteModalSeguro'));
    const confirmDeleteButtonSeguro = document.getElementById('confirmDeleteButtonSeguro');
    
    deleteSeguroButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-id');
            
            confirmDeleteButtonSeguro.href = `CRUD/EliminarDatosSeguro.php?Id=${productId}`;
            confirmDeleteModalSeguro.show();
        });
        });
    });
    </script>
    
</body>

</html>