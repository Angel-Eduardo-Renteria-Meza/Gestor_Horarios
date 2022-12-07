<?php
session_start();
//si esta esta definida permite que yo entre
if (isset($_SESSION['usuario'])) {
    include "header.php";
?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Información de Carreras</h1>
            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregaCategoria">
                        <span class="fa-solid fa-square-plus"></span> Agregar nueva carrera
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaCategorias"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal agregar categoria-->
    <div class="modal fade" id="modalAgregaCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva carrera</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmCategorias">
                        <label for="">Nombre de la carrera:</label>
                        <!-- <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control"> -->
                        <select type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
                            <option value="Tecnologias de la información">Tecnologias de la información</option>
                            <option value="Desarrollo de negocios BIS">Desarrollo de negocios BIS</option>
                            <option value="Desarrollo de negocios clasica">Desarrollo de negocios clasica</option>
                            <option value="Diseño digital">Diseño digital</option>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalActualizarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="frmActualizaCategoria">
                    <input type="text" id="idCategoria" name="idCategoria" hidden>
                    <label for="">Categoria</label>
                    <input type="text" id="categoriaU" name="categoriaU" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones de categorias-->
    <script src="../js/categorias.js"></script>
    <script>
        $(document).ready(function() {
            $('#tablaCategorias').load("categorias/tablaCategoria.php");

            $('#btnGuardarCategoria').click(function() {
                agregarCategoria();
            });
            $('#btnActualizaCategoria').click(function(){
                actualizaCategoria();
            });
        });
    </script>
<?php
    //con el else indico que si ya se cerro sesion, redirija al index.php
} else {
    header("location:../index.php");
}
?>