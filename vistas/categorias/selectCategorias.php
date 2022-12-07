<?php
session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();

$idUsuario = $_SESSION['idUsuario'];
//sql para que el admin vea sus categorias creadas
 $sql = "SELECT id_categoria, nombre FROM t_categorias where id_usuario = '$idUsuario'";
 $result = mysqli_query($conexion, $sql);
//sql para obtener el id del usuario que va a recibir el horario
 $sql1 = "SELECT id_usuario, nombre FROM t_usuarios";
 $p= mysqli_query($conexion, $sql1);


?>

<select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
    <?php 
    while($mostrar = mysqli_fetch_array($result)){
        $idCategoria = $mostrar['id_categoria'];
        ?>
        <option value=" <?php echo $idCategoria?> "> <?php echo $mostrar['nombre']; ?> </option>
        <?php
    }
    ?>
</select>

<label for="">Para:</label>
<select name="idpara" id="idpara" class="form-control">
    <?php while($m=mysqli_fetch_array($p)){?>
        <option value="<?php echo $m['id_usuario'];?>"><?php echo $m['nombre'];?></option>
    <?php }?>
</select>