<?php
session_start();
require_once "../../clases/Conexion.php";
$idUsuario = $_SESSION['idUsuario'];
$conexion = new Conectar();
$conexion = $conexion->conexion();
?>

<div class="table-responsive">
    <table class="table-hover table table-bordered" id="tablaCategoriasDataTable">
        <thead class="text-secondary">
            <tr >
                <td>Nombre</td>
                <td>Fecha</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody class="text-primary">
            <?php
            // $sql = "SELECT id_categoria, 
            //                 nombre, 
            //                 fechaInsert 
            //                 FROM t_categorias 
            //                 WHERE id_usuario =' $idUsuario'";
            $sql = "SELECT id_categoria, 
                            nombre, 
                            fechaInsert 
                            FROM t_categorias 
                            WHERE id_usuario";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {
                $idCategoria = $mostrar['id_categoria'];
            ?>
                <tr>
                    <td> <?php echo $mostrar['nombre']; ?> </td>
                    <td> <?php echo $mostrar['fechaInsert']; ?> </td>
                    <td>
                        <span class="btn btn-warning btn-sm" onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" data-bs-toggle="modal" data-bs-target="#modalActualizarCategoria">
                            <span class="fa-solid fa-arrows-rotate"></span>

                        </span>
                    </td>
                    <td>
                        <span class="btn btn-danger btn-sm" onclick="eliminarCategorias('<?php echo $idCategoria ?>')">
                            <span class="fa-solid fa-circle-minus"></span>
                        </span>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#tablaCategoriasDataTable').DataTable();
    });
</script>