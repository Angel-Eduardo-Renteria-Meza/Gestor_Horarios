<?php
include_once('sesiones.php');
include_once('encabezado.php');
include_once('selectidapi.php'); 
$entrar="";
   $id=$_REQUEST['id_qj'];

   $payload = json_encode(array("id_qj" => $id));


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/appweb\parcial3\proyectos\apputd\api_bd\api_base_de_datos\api_base\controllers/queja_sugerencia.php?op=delete',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    if ($response) {
        $entrar = "elim_api";
      }
      include_once('alertas.php');
      
    ?>
</body>
</html>