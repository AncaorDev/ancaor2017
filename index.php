<?php 
/* 
Versión Actual Ancaor v3.0
*/
//Archivo que controla toda la web.
// Obtenemos toda la información que necesitaremos desde core.php
require ('core/core.php');
// Obtenemos el Servidor , en caso de server local sera => http://localhost 
$host= $_SERVER["HTTP_HOST"];
// Obentenos la URL, ejemplo al ser inicio sera => /ancaor2017/inicio
$url= $_SERVER["REQUEST_URI"];

//Puede comprobarse des-comentando la siguiente linea.
// echo "http://" . $host ." - ". $url;

// Modo desarrollo, usado antes de tener la base de datos (Ancaor v0.5).
// $_SESSION['iduser'] = 1;

// Obtenemos la los datos de la URL por GET en este casi es "page" , revisar .htaccess para mas información
if (isset($_GET['page'])) {
  //Combrobamos si tiene algundato dato.
  $cant = strlen($_GET['page']);
  if ($cant > 0) {
     // Si es mayor de 0 comprabamos que exista.
    if (file_exists('controllers/page/'.$_GET['page'].'Controller.php')) {
            include('controllers/page/'.$_GET['page'].'Controller.php');
        } else if (file_exists('controllers/panel/'.$_GET['page'].'Controller.php')) {
            include('controllers/panel/'.$_GET['page'].'Controller.php');
        } else if($_GET['page']== 'index.php'){
            include('controllers/page/inicioController.php');
        } else if($_GET['page']== 'inicio'){
            include('controllers/page/inicioController.php');
        }else {
            include('controllers/error/404Controller.php');
        }
  } else if ($cant == 0 or $cant == ''){
     // Caso de no tener datos lo mandamos a Inicio
    header('Location:'.HOME.'inicio');
  } else {
    include 'controllers/error/403Controller.php';
  }
}

 ?>