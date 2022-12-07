function agregarArchivosGestor(){
     //la propiredad FormData nos permite enviar archivos
     var formData = new FormData(document.getElementById('frmArchivos'));
     
     $.ajax({
       url:"../procesos/gestor/guardarArchivos.php",
       type:"POST",
       //Reconozca el formulario como html aunque contenga archivos (datatype)
       datatype:"html",
       data: formData,
       cache:false,
       contentType:false,
       processData:false,
       success:function(respuesta){
         console.log(respuesta);
         respuesta = respuesta.trim();
         if (respuesta == 1){
            $('#frmArchivos')[0].reset();
            $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
            swal(":D", "Agregado con exito", "success");
         }else{
            swal(":(", "Fallo al agregar", "error");
         }
       }          
     });
}

function eliminarArchivo(idArchivo, idPara){
  swal({
    title: "Estas seguro de eliminar este archivo",
    text: "Una vez eliminado, no podra recuperarse",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type:"GET",
        data:{ idArchivo : idArchivo, idPara : idPara},
        //"idArchivo=" + idArchivo, "idpara=" : idpara, 
        url:"../procesos/gestor/eliminaArchivo.php",
        success:function(respuesta){
          respuesta = respuesta.trim();
          if (respuesta == 1){
            $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
            swal("Eliminado con exito", {
              icon: "success",
            });
          }else{
            swal("Fallo al eliminar", {
              icon: "error",
            });            
          }
        }
      });
    }
  });
}
function obtenerArchivoPorId(idArchivo){
  $.ajax({
    type:"POST",
    data:"idArchivo=" + idArchivo,
    url:"../procesos/gestor/obtenerArchivo.php",
    success:function(respuesta){
      $('#archivoObtenido').html(respuesta);
    }
  });
}
