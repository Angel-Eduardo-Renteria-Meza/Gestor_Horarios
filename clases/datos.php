<?php
include_once("conexion.php");
$query = "SELECT id_categoria, SUM(horas) as tiempo FROM t_archivos GROUP BY nombre";
$resultado = $con->query($query);
if($resultado->num_rows > 0){
    foreach($resultado as $data){
        $categoria[]=$data['id_categoria'];
        $tiempo[]=$data['tiempo'];
    }
}
$query2 = "SELECT 
archivos.id_archivo as idArchivo,
usuario.nombre as nombreUsuario,
categorias.nombre as categoria,
archivos.nombre as nombreArchivo,
archivos.tipo as tipoArchivo,
archivos.ruta as rutaArchivo,
archivos.fecha as fecha,
archivos.horas as horas,
archivos.grupos as grupos,
archivos.para as para
FROM
t_archivos AS archivos
    INNER JOIN
t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
    INNER JOIN
t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria";
$resultado2 = $con->query($query2);
if($resultado2->num_rows > 0){
    foreach($resultado2 as $data){
        $horas[]=$data['horas'];
        $grupos[]=$data['grupos'];
    }
}
?>