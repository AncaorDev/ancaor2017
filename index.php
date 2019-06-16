<?php 
require ('core/core.php');
// Archivo que controla toda la web
$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
// echo "http://" . $host . $url;

$_SESSION['iduser'] = 1;
if (isset($_GET['page'])) {
  $cant = strlen($_GET['page']);
  if ($cant > 0) {
    if (file_exists('controllers/page/'.$_GET['page'].'Controller.php')) {
            include('controllers/page/'.$_GET['page'].'Controller.php');
        } else if (file_exists('controllers/panel/'.$_GET['page'].'Controller.php')) {
            include('controllers/panel/'.$_GET['page'].'Controller.php');
        } else if($_GET['page']== 'index.php'){
            include('controllers/index/inicioController.php');
        } else if($_GET['page']== 'inicio'){
            include('controllers/index/inicioController.php');
        }else {
            include('controllers/error/404Controller.php');
        }
  } else if ($cant == 0 or $cant == ''){
    header('Location:'.HOME.'inicio');
  } else {
    include 'controllers/error/403Controller.php';
  }
}

 ?>