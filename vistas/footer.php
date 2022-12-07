<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
<div class="container">
  <link rel="stylesheet" href="../librerias/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" href="inicio.css">

  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24">
          <use xlink:href="#bootstrap" />
        </svg>
      </a>
      <span class="">"Sistema gestor de horarios"</span>
    </div>
    <div>
      <table class="table-bordered">
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <p>Traductor</p>
          <?php
          include_once('traductor.php');
          ?>
        </ul>
    </div>
    </table>

  </footer>
</div>
<script src="../librerias/jquery-3.6.0.min.js"></script>
<script src="../librerias//bootstrap4/popper.min.js"></script>
<script src="../librerias/bootstrap4/bootstrap.min.js"></script>
<script src="../librerias/sweetalert.min.js"></script>
<script src="../librerias/datatable/jquery.dataTables.min.js"></script>
<script src="../librerias/datatable/dataTables.bootstrap5.min.js"></script>
</body>

</html>