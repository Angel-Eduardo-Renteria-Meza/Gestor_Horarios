<?php
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();

$consultaaa="select * from t_archivos";


$resultado=mysqli_query($conexion, $consultaaa);



?>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered" id="tablaUsuDataTable">
                <thead cla>
                    <tr class="text-secondary">
                        <th class="text-center">Nombre:</th>
                        <th class="text-center">Horas por semana</th>
                        <th class="text-center">Aulas</th>
                        <th class="text-center">Grupos</th>
                        <th class="text-center">Carreras:</th>

                        </tr>
                </thead>
                <tbody class="text-primary">
                     
                    <?php while($fila=mysqli_fetch_array($resultado,)){?>
                    <tr>
                       
                        <td class="text-center"><?php echo $fila['id_usuario']; ?></td>
                        <td class="text-center"><?php echo $fila['horas']; ?></td>
                        <td class="text-center"><?php echo $fila['salones']; ?></td>
                        <td class="text-center"><?php echo $fila['grupos']; ?></td>
                        <td class="text-center"><?php echo $fila['id_categoria']; ?></td>


                    </tr>
                        <?php }?>
                        
                        <tr>
                       
                       <td class="text-center">Ing. Omar Gomez</td>
                       <td class="text-center">19</td>
                       <td class="text-center">Lab 2; B21</td>
                       <td class="text-center">4A; 4B; 1C</td>
                       <td class="text-center">Tecnologias de la informacion; Desarrollo de negocios    </td>


                   </tr>
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