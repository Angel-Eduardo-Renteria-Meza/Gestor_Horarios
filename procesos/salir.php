<?php
//Nos permite iniciar seion 
session_start();
//Despues destruye la sesion
session_destroy();

header("location:../index.php");
?>