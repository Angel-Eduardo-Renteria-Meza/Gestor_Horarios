<?php
session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['idUsuario'];
if ($_SESSION['priv'] == "admin") {
 //sql admin
 $sql = "SELECT 
 archivos.id_archivo as idArchivo,
 usuario.nombre as nombreUsuario,
 categorias.nombre as categoria,
 archivos.nombre as nombreArchivo,
 archivos.tipo as tipoArchivo,
 archivos.ruta as rutaArchivo,
 archivos.fecha as fecha,
 archivos.para as para
 FROM
 t_archivos AS archivos
     INNER JOIN
 t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
     INNER JOIN
 t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
     AND archivos.id_usuario = '$idUsuario'"; 
}else{
//sql docente
$sql = "SELECT 
archivos.id_archivo as idArchivo,
usuario.nombre as nombreUsuario,
categorias.nombre as categoria,
archivos.nombre as nombreArchivo,
archivos.tipo as tipoArchivo,
archivos.ruta as rutaArchivo,
archivos.fecha as fecha
FROM
t_archivos AS archivos
    INNER JOIN
t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
    INNER JOIN
t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
    AND archivos.para = '$idUsuario'";
}
$result = mysqli_query($conexion, $sql);

?>


<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered" id="tablaGestorDataTable">
                <thead class="text-secondary" >
                    <tr>
                        <th>Carrera</th>
                        <!--<th>Nombre</th>-->
                        <th>Fecha</th>
                        <th>Descargar</th>
                        <th>Visualizar</th>
                        <?php if ($_SESSION['priv'] == "admin") { ?>
                        <th>Eliminar</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody class="text-primary">
                    <?php
                    /*
                    Arreglo de extensiones validas
                    */
                    $extensionesValidas = array('png', 'jpg', 'pdf', 'mp3', 'mp4', 'JPG');
                    while ($mostrar = mysqli_fetch_array($result)) {
                        $rutaDescarga = "../archivos/" . $idUsuario . "/" . $mostrar['nombreArchivo'];
                        $nombreArchivo = $mostrar['nombreArchivo'];
                        $idArchivo = $mostrar['idArchivo'];
                        $idpara = $mostrar['para'];
                    ?>
                        <tr>
                            <td><?php echo $mostrar['categoria'] ?></td>
                            <!--<td></td>-->
                            <td><?php echo $mostrar['fecha'] ?></td>
                            <td>
                                <a href="<?php echo $rutaDescarga ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-info btn-sm">
                                    <span class="fa-solid fa-cloud-arrow-down"></span>
                                </a>
                            </td>
                            <td>
                                <?php
                                for ($i = 0; $i < count($extensionesValidas); $i++) {
                                    if ($extensionesValidas[$i] == $mostrar['tipoArchivo']) {
                                ?>
                                        <span class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#visualizarArchivo" onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
                                            <span class="fa-solid fa-eye"></span>
                                        </span>
                                <?php

                                    }
                                }
                                ?>
                            </td>
                            <?php if ($_SESSION['priv'] == "admin") { ?>
                            <td>
                                <span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivo ?>', '<?php echo $idpara?>')">
                                    <span class="fa-solid fa-circle-minus"></span>
                                </span>
                            </td>
                            <?php } ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tablaGestorDataTable').DataTable();
    });
</script>