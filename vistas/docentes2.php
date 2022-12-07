<?php
session_start();
require_once "../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
if (isset($_SESSION['usuario'])) {
    include ("header.php");
?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4 text-center">Informacion de horarios por docente</h1>
      <br>
      <a href="../vistas/docentes.php">
      <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
        <span class="fa-solid"></span> Regresar
      </span>
      </a>
     
      <hr>
      <div id="tablaUsu"></div>
    </div>
    
  </div>
  <?php include ("footer.php"); ?>
  <script>
    $(document).ready(function() {
      $('#tablaUsu').load("docentes/docentes_info.php");
    });
  </script>
<?php
} else {
  header("location:../index.php");
}
?>