<?php 
// LIBRERIAS
// require('vendor/autoload.php');
$url = 'http://ancaor.com/beta/' ; // <- Nombre de la carpeta del proyecto 
//Conexion 
DEFINE('HOST','localhost'); // <-- Dirección Host
DEFINE('USER','u716187065_admin');  // <-- Nombre de Usuario 
DEFINE('PASS','diablo123'); // <-- Contraseña para acceso a la Base de Datos
DEFINE('DBNAME','u716187065_new'); // <-- Nombre de la Base de Datos

// CONSTANTES
DEFINE('HOME',);
DEFINE('RUTE','');
DEFINE('HTML_DIR','views/'); // <-- Dirección de archivos HTML
//DEFINE('TITLE','');  // <-- Titulo de pagina
DEFINE('WEBSITE','Portafolio Ancaor'); // <-- Nombre de la web
DEFINE('FB_ID',''); // <-- ID FB
DEFINE('AUTHOR','Ancaor'); // <-- Autor de la pagina
DEFINE('BASE',$url.'views'); //  <-- Dirección Vistas (....)
DEFINE('DIR_ROOT','');  // <-- Direccion Root (General)
DEFINE('COPY','Ancaor &trade;'.' 2015 - '.date('Y')); //<-- Copy Right
DEFINE('DATE',date('d-Y-m')); // Fecha Servidor 
//Extensión .html o .htm
DEFINE('EXT','phtml');

//URLS 
DEFINE('URL_PANEL',$url.'panel/');
DEFINE('URL_OTHER',$url.'other/');

// LIBS
DEFINE('DIR_LIBS','libs/');
// BOOTSTRAP
DEFINE('DIR_BS','libs/bootstrap/');

// RESOURCES
DEFINE('DIR_RS','resources/');

//Archivos necesarios
require('models/gestionBD.php');
require('models/pageModel.php');
require('models/logModel.php');
require('core/php/funciones.php');
require('libs/view.php');
require('libs/session/session.php');
require('libs/controller/ControllerConf.php');



//Definición de Zona Horaria


?>