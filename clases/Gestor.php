<?php
require_once "Conexion.php";
class Gestor extends Conectar{
    public function agregaRegistroArchivo($datos){
        $conexion = Conectar::conexion();
        $sql = "INSERT INTO t_archivos (id_usuario,
                                        id_categoria,
                                        nombre,
                                        tipo,
                                        ruta,
                                        para, horas, grupos, salones) 
                                        VALUES (?,?,?,?,?,?,8,'salon1','lab5')";
        $query = $conexion->prepare($sql);
        $query->bind_param("iisssi", $datos['idUsuario'],
                                    $datos['idCategoria'],
                                    $datos['nombreArchivo'],
                                    $datos['tipo'],
                                    $datos['ruta'],
                                    $datos['idpara']
                                    );
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }
    public function obtenNombreArchivo($idArchivo){
        $conexion = Conectar::conexion();
        $sql = "SELECT nombre FROM t_archivos WHERE id_archivo = '$idArchivo'";
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_array($result)['nombre'];
    }
    public function eliminarRegistroArchivo($idArchivo){
        $conexion = Conectar::conexion();
        $sql = "DELETE FROM t_archivos WHERE id_archivo = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idArchivo);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }
    /*public function eliminarRegistroIdParaArchivo($idPara){
        $conexion = Conectar::conexion();
        $sql = "DELETE FROM t_archivos WHERE para = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idPara);
        $respuesta = $query->execute();
//$query->close();
        //return $respuesta;
    }*/
    public function obtenerRutaArchivo($idArchivo){
        $conexion = Conectar::conexion();
        $sql = "SELECT nombre, tipo FROM t_archivos WHERE id_archivo = '$idArchivo'";
        $result = mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_array($result);
        $nombreArchivo = $datos['nombre'];
        $extension = $datos['tipo'];
        return self::tipoArchivo($nombreArchivo, $extension);
    }
    public function tipoArchivo($nombre, $extension){
        //condicion para que el usuario estandar lo vea
        if($_SESSION['priv'] == "estandar"){
            $idUsuario = $_SESSION['idUsuario'];
            $ruta = "../archivos/" . $idUsuario . "/" . $nombre;    
        }elseif($_SESSION['priv'] == "admin"){
            $ruta = "../archivos/Administrador/" . $nombre;
        }
        switch ($extension) {
            case 'png':
                return '<img src="'.$ruta.'" width="100%">';
                break;

            case 'jpg':
                return '<img src="'.$ruta.'" width="100%">';
                break;
            
            case 'pdf':
                return '<embed src="'.$ruta.'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
                break;
            
            case 'JPG':
                return '<img src="'.$ruta.'">';
                break;
            
            case 'PNG':
                return '<img src="'.$ruta.'">';
                break;

            default:
                # code...
                break;
        }
    }
}
?>
