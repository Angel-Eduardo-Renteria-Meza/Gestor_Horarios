<?php
session_start();
//si esta esta definida permite que yo entre
if (isset($_SESSION['usuario'])) {
  include "header.php";
  require_once('../clases/Conexion.php');

?>

  <link rel="stylesheet" href="../librerias/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" href="../librerias/datatable/dataTables.bootstrap5.min.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!--Sweetalert2 cdn-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="">
      <div id="inicio">
        <div class="contenido">
          <form action="https://formspree.io/f/mpznyyoe" method="POST" id="form">
            <div align=center class="bg">
              <h1 class="display-4 text-center mt-5">Contáctate con nosotros</h1>
              <br>
              <h3>Envíanos un correo y te responderemos lo más pronto posible</h3>
              <br>
              <hr>
              <div class="md-form mb-4 pink-textarea active-pink-textarea">
                <label>
                  Ingresa tu correo:
                  <input type="email" name="email" class="md-textarea form-control" autofocus>
                </label>
              </div>
              <br>
              <div class="md-form amber-textarea active-amber-textarea">
                <label>
                  Ingresa tu problema:
                  <br>
                  <textarea name="message" class="md-textarea form-control-lg" id="form18"></textarea>
                </label>
              </div>
              <!-- your other form fields go here -->
              <button type="submit" class="btn btn-lg btn-success">Enviar</button>
              <br>
              <script>
                const $form = document.querySelector('#form')
                $form.addEventListener('submit',handleSubmit)
                async function handleSubmit(event) {
                  event.preventDefault()
                  const form = new FormData(this)
                  const response = await fetch(this.action, {
                    method: this.method,
                    body: form,
                    headers: {
                      'Accept': 'application/json'
                    }
                  })
                  if (response.ok) {
                    this.reset()
                    Swal.fire({
                      icon: 'success',
                      title: 'Gracias por contactar al soporte, trabajaremos en tu problema.',
                      
                    })

                  }else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Ha ocurrido un error intenta nuevamente',
                      
                    })

                  }
                }
              </script>
              <?php include "footer.php"; ?>
            </div>
            <br>

          </form>
        </div>
      </div>
    </div>
  </div>
<!--con el else indico que si ya se cerro sesion, redirija al index.php-->
<?php
} else {
  header("location:../index.php");
}
?>
</body>
</html>
 