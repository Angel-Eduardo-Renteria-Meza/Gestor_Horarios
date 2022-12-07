<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css"> -->
    <title>Login</title>
</head>
<style>
body, html{
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    position: relative;
}
h1{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 2vw;
    font-weight: lighter;
    text-align:center;
}
.principal{
    min-height: 100vh;
    background: url(img/utdisnta.jpg) no-repeat center center fixed;
    background-size: cover;
}
.box{
    display: block;
    right: 35%;
    width: 25%;
    border-radius: 20%;
    background-size: cover;
    margin: 0 auto;
    position:absolute;
    
}
p{
    font-size: 2vmin;
}

.btn-login {
    text-align: center;
    display: inline-block;
    cursor: pointer;
    text-decoration: none;
    outline: none;
    color: rgb(0, 0, 0);
    background-color: #e3d109;
    border: 1px solid #000000;
    border-radius: 12%;
  }
  
  .btn-login:hover {
      background-color: #3e8e41
}
  
  .btn-login:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
  }
.error{
    margin-right: auto;
    margin-left: auto;
    text-align: center;	
    text-decoration: none;
    outline: none;
    border-radius: 5%;
	background-color: rgba(255, 0, 0, 0.866);
    border: 0.7px solid #000000;
}
label{
    font-style: italic;
}
.login{
    background-color: white;
    text-align: center;
    border: 1.3px solid #000000;
    border-radius: 5%;
    margin: 0 auto;
    padding: 15px;
    width: 40vw;
    position: absolute;
    top: 50%;
    left: 50%;
    align-content: center;
    transform: translate(-50%, -50%);
}
.login2{
    margin-top: 120px;
}
.login3{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold;
}

@media screen (max-width: 400px){
    .login, .error{
        width: 90%
    }
    
}

</style>

<body class="principal">
            <form method="post"  id="frmLogin" class="login form-group p-5" onsubmit="return logear()" autocomplete="off">
                <img class="box col-auto" src="img/logo3.webp" >
                <div class="login2">
                    <h1>SISTEMA INTEGRAL DE GESTIÓN DE LA UTD</h1>
                        
                
                <p class="login3 text-success">Ingrese sus credenciales para acceder al sistema</p>
                <br>
                <label for="login">Ingrese su número de empleado</label>
                <p><input type="text" placeholder="Ingrese su numero de empleado" class="form-control" name="login" id="login"></p>
                <label for="password">Ingrese su contraseña</label>
                <p><input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" name="contrasena"></p>
                <a href="">¿Olvidó su contraseña?</a>
                <br>
                <input type="submit" value="Entrar al sistema" class="btn btn-success">
                <input type="reset" name="borrar" class="btn btn-danger m-2" value="Borrar">

                </div>
            </form>     
            <!-- Remind Passowrd -->
 
</body>
    <script src="librerias/jquery-3.6.0.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script>
        function logear() {
            $.ajax({
                type: "POST",
                data: $('#frmLogin').serialize(),
                url: "procesos/usuario/login/login.php",
                success: function(respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        swal("Bienvenido ", "Ingresando a sistema gestor de horarios...", "success", {
                                button: "OK",
                            })
                            .then(function() {
                                location.href = 'vistas/inicio.php';
                            });
                        //window.location = "vistas/inicio.php";
                    } else {
                        swal("Fallo al ingresar", "Favor de revisar sus credenciales", "error");
                    }
                }
            });
            return false;
        }
    </script>


</html>