<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestor</title>
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="stylesheet" href="../librerias/bootstrap4/bootstrap.min.css">

    <link rel="stylesheet" href="../librerias/fontawesome/css/all.css">
    <link rel="stylesheet" href="../librerias/datatable/dataTables.bootstrap5.min.css">

    <script>
        function darkMode() {
            var element = document.body;
            var content = document.getElementById("DarkModetext");
            element.className = "navbar-dark","dark-mode a";
            content.innerText = "Dark Mode is ON";
        }

        function lightMode() {
            var element = document.body;
            var content = document.getElementById("DarkModetext");
            element.className = "light-mode";
            element.className = "navbar-light";
            content.innerText = "Dark Mode is OFF";
        }
    </script>
</head>

<body class="">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg static-top border-bottom">
    <!--<div class="container-btn-mode" id="DarkModeText">
            <div id="id-sun" class="btn-mode sun active">
                <a onclick="lightMode()"><i class="fas fa-sun"></i></a>
            </div>
            <div id="id-moon" class="btn-mode moon">
                <a onclick="darkMode()"><i class="fas fa-moon"></i> </a>
            </div>
        </div>-->
        <div class="form-check form-switch">
  <input type="checkbox" class="form-check-input" id="darkSwitch" />
  <label class="custom-control-label" for="darkSwitch">Modo oscuro</label>
</div>
<script src="../dark-mode-bootstrap/dark-mode-switch.min.js"></script>
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="../img/logo3.webp" alt="..." height="50w">
            </a>
            <div>
                <br>
               <!-- <p class=" font-weight-bold text"> Bienvenido: </p>-->
            </div>
            <p>Bienvenido:  <?php echo $_SESSION['usuario'] ?></p>
            <div class="btn-group btn-group-toggle text-center  " data-toggle="buttons">


            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg><i class="bi bi-list"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link text-success" aria-current="page" href="inicio.php"> <span class="fa-solid fa-house-user"></span> Inicio</a>
                    </li>
                    <?php if ($_SESSION['priv'] == "admin") { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Docentes
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="docentes.php"><span class="fa-solid fa-circle-info"></span> Información de docentes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Carreras
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="categorias.php"><span class="fa-solid fa-list-check"></span> Consultar carreras</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Horarios
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="gestor.php"><span class="fa-solid fa-folder"></span> Consultar horários</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="gestor.php"><span class="fa-solid fa-folder"></span> Consultar Horarios</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Contacto
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="soporte.php"><span class="fa-solid fa-circle-info"></span> Contáctanos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../seleccion_sistema/" style="color: #C70039 ;"><span class="fa-solid fa-arrow-right-from-bracket"></span> Salir</a>
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
            </div>
        </div>
    </nav>