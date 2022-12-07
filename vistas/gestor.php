<?php
session_start();
if (isset($_SESSION['usuario'])) {


  include "header.php";
  require_once('../clases/Conexion.php');
  $c = new Conectar();
  $conexion = $c->conexion();
 
  
?>
<body>
  

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-center">Información de horarios</h1>
      <?php if ($_SESSION['priv'] == "admin") { ?>
      <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarArchivos">
        <span class="fa-solid fa-square-plus"></span> Agregar horario
      </span>
      <?php } ?>
      <hr>
      <div id="tablaGestorArchivos"></div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Horarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--Agregamos la propiedad enctype  que se encarga de El atributo enctype especifica cómo se deben codificar los datos del formulario antes de enviarlos al servidor.-->
        <form id="frmArchivos" enctype="multipart/form-data" method="post">
          <label for="">Selecciona la carrera:</label>
          <div id="categoriasLoad"></div>
          <label for="">Selecciona el archivo:</label>
          <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple=""><!--name="archivos[]"-->
          <label for="">Horas por semana: </label>
          <input type="text" name="horas" id="horas" class="form-control" multiple=""><!--name="archivos[]"-->
          <label for="">Grupos de clase:</label>
          <input type="text" name="grupos" id="grupos" class="form-control" multiple=""><!--name="archivos[]"-->
          <label for="">Salones de clase:</label>
          <input type="text" name="salones" id="salones" class="form-control" multiple=""><!--name="archivos[]"-->

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="archivoObtenido"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</body>
<br>
  <?php include "footer.php"; ?>
  <script src="../js/gestor.js"></script>
  <script>
    $(document).ready(function() {
      $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
      $('#categoriasLoad').load("categorias/selectCategorias.php");

      $('#btnGuardarArchivos').click(function(){
        agregarArchivosGestor();
      });
    });
  </script>
<?php
} else {
  header("location:../index.php");
}
?>