<?php
session_start();
require_once "../../clases/Gestor.php";
$Gestor = new Gestor();
$idArchivo = $_GET['idArchivo'];
$idUsuario = $_SESSION['idUsuario'];
$nombreArchivo = $Gestor->obtenNombreArchivo($idArchivo);
$idpara = $_GET['idPara'];

$rutaEliminar = "../../archivos/Administrador/" . $nombreArchivo;
$rutaCopia= '../../archivos/' .$idpara. "/" .$nombreArchivo;
    if (unlink($rutaEliminar)){
        echo $Gestor->eliminarRegistroArchivo($idArchivo);
        unlink($rutaCopia);
    }elseif(unlink($rutaCopia)){
        echo $Gestor->eliminarRegistroArchivo($idArchivo);
    }else{
        echo 0;
    }
    

    //condicional para eliminar el archivo de la ruta
    /*if (unlink($rutaCopia)){
        echo $Gestor->eliminarRegistroIdParaArchivo($idPara);
    }else{
        echo 0;
    }*/
?>
