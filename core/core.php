<?php 
// LIBRERIAS
// require('vendor/autoload.php');
$url = 'http://localhost/ancaor2017-v4/' ; // <- Nombre de la carpeta del proyecto 

/* 
Si no se cambia el nombre de la carpeta no cambiar nada
Para el funcionamiento correcto modificar las rutas en las siguientes lineas,
tambien en los archivos => 
En core/php 
creardata.php
subir.php

En core/js
registrodata.js :
var urlphp = '/ancaor2017/core/php/';
var urlajax = '/ancaor2017/ajax.php';
y en summernote.conf.js
Trabajando en un metodo para cambiarlo directamente desde core.php

// Revisar la librería Controller en libs/controller
*/

//Conexion 
/* IMPORTANTE - MODIFICAR LAS LINEAS SIGUIENTES: 
 Ejemplo: ('HOST','Modificar solo esto');
*/
DEFINE('HOST','localhost'); // <-- Dirección Host
DEFINE('USER','root');  // <-- Nombre de Usuario 
DEFINE('PASS',''); // <-- Contraseña para acceso a la Base de Datos
DEFINE('DBNAME','ancaor2017'); // <-- Nombre de la Base de Datos

// CONSTANTES
DEFINE('HOME',$url);
DEFINE('RUTE','');
DEFINE('DIR_CONTROLLER','ancaor2017'); // <- Nombre de la carpeta general en la que esta el proyecto
DEFINE('HTML_DIR','views/'); // <-- Dirección de archivos HTML
//DEFINE('TITLE','');  // <-- Titulo de pagina
DEFINE('WEBSITE','Portafolio Ancaor'); // <-- Nombre de la web
DEFINE('FB_ID',''); // <-- ID FB
DEFINE('AUTHOR','Ancaor'); // <-- Autor de la pagina
DEFINE('BASE',$url.'views'); //  <-- Dirección Vistas (....)
DEFINE('DIR_ROOT','/'.'ancaor2017-v4'.'/');  // <-- Direccion Root (General)
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
require('models/proyectoModel.php');
require('models/dataModel.php');
require('models/logModel.php');
require('core/php/funciones.php');
require('libs/view.php');
require('libs/session/session.php');
require('libs/controller/ControllerConf.php');
require('libs/controller/controller.php');

//Definición de Zona Horaria


?>