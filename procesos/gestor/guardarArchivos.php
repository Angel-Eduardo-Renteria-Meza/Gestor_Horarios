<?php
session_start();
require_once "../../clases/Gestor.php";
$Gestor = new Gestor();
$para=$_POST['idpara'];
$idCategoria = $_POST['categoriasArchivos'];
$idUsuario = $_SESSION['idUsuario'];
//$horas = $_POST['horas'];
//$clase = $_POST['clases'];
//$salon = $_POST['salones'];

if ($_FILES['archivos']['size'] > 0){
    //realizar una condicion para que el admin pueda ver y descargar el horario que mando
    //ruta para que el docente pueda ver y descargar
    
        $carpetaUsuario = '../../archivos/Administrador';

        $rutaCopia = '../../archivos/'.$para;
        
    if (!file_exists($carpetaUsuario)){
        mkdir($carpetaUsuario, 0777, true);
        
    }

    if(!file_exists($rutaCopia)){
        mkdir($rutaCopia, 0777, true);
    }


    $totalArchivos = count($_FILES['archivos']['name']); 
    for ($i=0; $i < $totalArchivos; $i++){
        $nombreArchivo = $_FILES['archivos']['name'][$i];

        $explode = explode('.', $nombreArchivo);
        $tipoArchivo = array_pop($explode);

        $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
        $rutaFinal = $carpetaUsuario . "/" . $nombreArchivo;
        $rutaFinalcopia = $rutaCopia . "/" . $nombreArchivo;

        $datosRegistroArchivo = array(
            "idpara" => $para,
            "idUsuario" => $idUsuario,
            "idCategoria" => $idCategoria,
            "nombreArchivo" => $nombreArchivo,
            "tipo" => $tipoArchivo, 
            "ruta" => $rutaFinal,           
            // "horas" => $horas,
             //"clases" => $clase,
            //"salones" => $salon
         );
        // if (move_uploaded_file($rutaAlmacenamiento1, $rutaFinal1)){
        //     $respuesta1 = $Gestor->agregaRegistroArchivo($datosRegistroArchivo);
        // }

        if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
            $respuesta = $Gestor->agregaRegistroArchivo($datosRegistroArchivo);
            copy($rutaFinal , $rutaFinalcopia);
        }
        
    }
    echo $respuesta;
} else {
    echo 0;
}
