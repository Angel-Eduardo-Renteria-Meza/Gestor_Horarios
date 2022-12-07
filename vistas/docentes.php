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
      <h1 class="display-4 text-center">Información de docentes</h1>
      <br>
      <a href="registro.php">
      <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
        <span class="fa-solid fa-square-plus"></span> Registrar docentes
      </span>
      </a>
      <a href="../vistas/docentes2.php"><span class="btn btn-success" data-bs-toggle="modal" data-bs-target="#">
        <span class="fa-solid fa-user"></span> Información de horarios de docentes
      </span></a>

     
      <hr>
      <div id="tablaUsu"></div>
    </div>
    
  </div>
  <?php include ("footer.php"); ?>
  <script>
    $(document).ready(function() {
      $('#tablaUsu').load("docentes/docentes.php");
    });
  </script>
<?php
} else {
  header("location:../index.php");
}
?>