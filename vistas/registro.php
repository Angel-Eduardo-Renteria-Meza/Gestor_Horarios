<?php
session_start();
if (isset($_SESSION['usuario'])) {


  include "header.php";
  require_once('../clases/Conexion.php');
  $c = new Conectar();
  $conexion = $c->conexion();
 
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="stylesheet" href="../librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="../librerias/fontawesome/css/all.css">
    <link rel="stylesheet" href="../librerias/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../css/registro.css">
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Registro</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Registro de usuario</h1>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <!--Funcion que permitira mandar a llamar el proceso-->
                <form action="" id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
                    <label for="">Nombre de docente:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required="">
                    <label for="">Fecha de nacimiento:</label>
                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" readonly="">
                    <label for="">Email:</label>
                    <input type="email" name="correo" id="correo" class="form-control" required="">
                    <label for="">Matricula:</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required="">
                    <label for="">Password:</label>
                    <input onkeyup="trigger()" type="Password" name="password" id="password" class="form-control" required="">
                    <ul>
                        <li id="minusculas">Usa mayusculas</li>
                        <li id="especial">Caracteres Especiales</li>
                        <li id="numero">Usa números</li>
                    </ul>
                    <div class="indicador">   
                        <span class="weak"></span>
                        <span class="medium"></span>
                        <span class="strong"></span>
                    </div> 
                    <div class="text" align="center"></div>
                    <label for="">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio" class="form-control" required="">
                    <label for="">Telefono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" required="">
                    <label for="">Privilegio:</label>
                    <select type="text" name="priv" id="priv" class="form-control" required="">
                        <option value="admin">Administrador</option>
                        <option value="estandar">Empleado</option>
                    </select>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-primary text-left">Registrar</button>
                        </div>
                        <br>
                        <div class="col-sm-6">
                            <a href="docentes.php" class="btn btn-success">Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script src="librerias/jquery-3.6.0.min.js"></script>
    <script src="librerias/jquery-ui-1.13.1/jquery-ui.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script>
        $(function() {
            var fechaA = new Date();
            var yyyy = fechaA.getFullYear();
            $("#fechaNacimiento").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1990:' + yyyy,
                dateFormat: "dd-mm-yy"
            });
        });

        function agregarUsuarioNuevo() {
            $.ajax({
                method: "POST",
                data: $('#frmRegistro').serialize(),
                url: "procesos/usuario/registro/agregarUsuario.php",
                success: function(respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $("#frmRegistro")[0].reset();
                        swal(":D", "Agregado con exito!", "Success");
                    } else if (respuesta == 2) {
                        swal("Este usuario ya existe, ingresa otro");
                    } else {
                        $("#frmRegistro")[0].reset();
                        swal(":D", "Agregado con exito!", "Success");
                    }
                }
            });
            return false;
        }
    </script>
    <script>
        const indicador = document.querySelector(".indicador");
        const input = document.querySelector("#password");
        const weak = document.querySelector(".weak");
        const medium = document.querySelector(".medium");
        const strong = document.querySelector(".strong");
        const text = document.querySelector(".text");
        let regExpWeak = /[A-Z]/;
        let regExpMedium = /\d+/;
        let regExpStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;
        var vali = [regExpWeak, regExpMedium, regExpStrong];
        var elem = [$("#minusculas"),$("#numero"),$("#especial")];
        
        $("#password").on("keyup", function(){
        var pass = $("#password").val();
        

        
            for(var i = 0; i < 3; i++){
            if(vali[i].test(pass)){
                //no esconde los elementos ya validados 
                elem[i].hide();
                
            }else{
                elem[i].show();
            }     
            }
    });
        
        function trigger(){
            //for para el cumplimiento de validaciones que muestran o ocultan las viñetas
            /*for(var i = 0; i < 3; i++){
            if(vali[i].test(pass)){
                //no esconde los elementos ya validados 
                elem[i].hide();
                
            }else{
                elem[i].show();
            }    
        }*/
            if(input.value != ""){
            indicador.style.display = "block";
            indicador.style.display = "flex";
            if(input.value.length <= 3 && (input.value.match(regExpWeak) || input.value.match(regExpMedium) || input.value.match(regExpStrong)))no=1;
            if(input.value.length >= 6 && ((input.value.match(regExpWeak) && input.value.match(regExpMedium)) || (input.value.match(regExpMedium) && input.value.match(regExpStrong)) || (input.value.match(regExpWeak) && input.value.match(regExpStrong))))no=2;
            if(input.value.length >= 6 && input.value.match(regExpWeak) && input.value.match(regExpMedium) && input.value.match(regExpStrong))no=3;
            if(no==1){
                weak.classList.add("active");
                text.style.display = "block";
                text.textContent = "Tu contraseña es debil";
                text.classList.add("weak");
            }if(no==2){
                medium.classList.add("active");
                text.textContent = "Tu contraseña es segura";
                text.classList.add("medium");
            }else{
                medium.classList.remove("active");
                text.classList.remove("medium");
            }if(no==3){
                weak.classList.add("active");
                medium.classList.add("active");
                strong.classList.add("active");
                text.textContent = "Tu contraseña es muy segura";
                text.classList.add("strong");
            }else{
                strong.classList.remove("active");
                text.classList.remove("strong");
            }
        }else{
            indicador.style.display = "none";
            text.style.display = "none";
        }
    }
    </script>
</body>

</html>
</html>
<?php include "footer.php"; ?>
  <script src="../js/gestor.js"></script>
  