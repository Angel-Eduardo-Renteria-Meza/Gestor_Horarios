<?php
//Se usa para usar el proceso una sola vez
require_once "../../../clases/Usuario.php";
//Saco mi variable password para asi asignarle un metodo de encriptacion
$password = sha1($_POST['password']);
$fechaNacimiento =explode("-", $_POST['fechaNacimiento']);
$fechaNacimiento = $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0];
//Creamos un array con las variables de cada input con el metodo post para asi se envien a nuestra BD
$datos = array(
    //Creo un llave para despues mandarlo a llamar por su nombre en el array y no por la posicion
"priv" => $_POST['priv'],
"nombre" => $_POST['nombre'],
"fechaNacimiento" => $fechaNacimiento,
"correo" => $_POST['correo'],
"usuario" => $_POST['usuario'],
"password" => $password,
"domicilio" => $_POST['domicilio'],
"telefono" => $_POST['telefono'],

);
$usuario = new Usuario();
//CON EL (->) MANDO A LLAMAR LA FUNCION AGREGAR USUARIOS Y ADENTRO LA VARIABLE DATOS QUE ES MI ARRAY CON TODOS LOS DATOS
echo $usuario->agregarUsuario($datos);
?>