<?php
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();

$consultaaa="select * from t_usuarios";

$resultado=mysqli_query($conexion, $consultaaa);


?>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaUsuDataTable">
                <thead class="text-secondary">
                    <tr>
                        <th class="text-center">No de empleado:</th>
                        <th class="text-center">Nombre:</th>
                        <th class="text-center">Domicilio:</th>
                        <th class="text-center">Fecha de Nacimiento:</th>
                        <th class="text-center">Email:</th>
                        <th class="text-center">Teléfono:</th>
                        <th class="text-center">Registro:</th>

                        </tr>
                </thead>
                <tbody class="text-primary">
                    <?php while($fila=mysqli_fetch_array($resultado)){?>
                    <tr>
                        <td class="text-center"><?php echo $fila['usuario']; ?></td>
                        <td class="text-center"><?php echo $fila['nombre']; ?></td>
                        <td class="text-center"><?php echo $fila['domicilio']; ?></td>
                        <td class="text-center"><?php echo $fila['fechaNacimiento']; ?></td>
                        <td class="text-center"><?php echo $fila['email']; ?></td>
                        <td class="text-center"><?php echo $fila['telefono']; ?></td>
                        <td class="text-center"><?php echo $fila['insert']; ?></td>

                    </tr>
                        <?php }?>
                    </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tablaUsuDataTable').DataTable();
    });
</script>