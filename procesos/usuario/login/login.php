<?php
session_start();
require_once "../../../clases/Usuario.php";
$usuario = $_POST['login'];
$password = sha1($_POST['password']);

$usuarioObj = new Usuario();
echo $usuarioObj->login($usuario, $password);

include_once('../../../clases/Conexion.php');
$conexion = new Conectar();
$conexion = $conexion->conexion();

$sql= "SELECT privilegio
       FROM t_usuarios
       WHERE usuario = '$usuario'
       AND password = '$password'";

    $resultado = mysqli_query($conexion,$sql);
    $f=mysqli_fetch_assoc($resultado);

    $_SESSION['priv']=$f['privilegio'];


?>