<?php 
/**
* 
*/
class Core {
private $host;
private $url;
function __construct() {
	$this -> ejecutar();
}
function ejecutar(){
	date_default_timezone_set("America/Lima");
	/* ---------------------------------------------------
	   Requerimos los datos que leen y escriben datos para 
	   el correcto funcionamiento del sistema.
	--------------------------------------------------- */
	if (file_exists('core/php/funciones/readwritejson.php')) {
		require_once('core/php/funciones/readwritejson.php');
	} else {
		echo "Not found file of readwrite json";
	}
	/* ---------------------------------------------------
	   Requerimos las funciones necesarias
	--------------------------------------------------- */
	$functions = ['redirect','escribir','renderHTML','funciones','dateTime'];

	for ($i=0; $i < count($functions); $i++) { 
		require_once('core/php/funciones/'.$functions[$i].'.php');
	}
	/* ---------------------------------------------------
		   Obtenemos las variables de .dataconfig 
	--------------------------------------------------- */
	try {
		$datos = leerDatos();
	} catch (Exception $e) {
		throw $w;
	}
	/* ---------------------------------------------------
		Obtenemos el host en la cual esta el proyecto
	--------------------------------------------------- */
	$https = (!empty($_SERVER['HTTPS']) ? 'https' : 'http');
	
	if (stristr($_SERVER["HTTP_HOST"], "localhost") === false) {
		$this -> host = $https . '://' . $_SERVER["HTTP_HOST"] .'/';
	} else {
		$urldata = explode('/', $_SERVER['SCRIPT_NAME']);
		$folder = $urldata[1];
		$this -> host = $https . '://' . $_SERVER["HTTP_HOST"] .'/' . $folder . '/' ;
	}
	/* ---------------------------------------------------
		Autoregistro de los modelos
	--------------------------------------------------- */
	
	spl_autoload_register( function( $NombreClase ) {
		if (file_exists('model/'.$NombreClase . '.php')) {
			require_once 'model/'.$NombreClase . '.php';
		} else if (file_exists('core/php/clases/'.$NombreClase . '.php')){
			require_once 'core/php/clases/'.$NombreClase . '.php';
		} else {
			echo "Not found class archive $NombreClase "." Error en core.php línea : " . __LINE__ . "</br>";
		}
	});
	/* ---------------------------------------------------
			Constantes del proyecto
	--------------------------------------------------- */
	DEFINE('HOST',$datos['HOST']); // <-- Dirección Host
	DEFINE('USER',$datos['USER']);  // <-- Nombre de Usuario 
	DEFINE('PASS',$datos['PASS']); // <-- Contraseña para acceso a la Base de Datos
	DEFINE('DBNAME',$datos['DBNAME']); // <-- Nombre de la Base de Datos
	DEFINE('HOME', $this -> host); // <-- URL principal
	DEFINE('BASE', $this -> host); //  <-- Dirección Vistas
	DEFINE('FB_ID',$datos['FB_ID']); // <-- ID FB
	DEFINE('AUTHOR',$datos['AUTHOR']); // <-- Autor de la pagina
	DEFINE('COPY','Ancaor &trade;'.' 2015 - '.date('Y')); //<-- Copy Right
	DEFINE('DIR_LIBS','libs/');  // <-- Dirección de archivos HTML
	DEFINE('C_JS','core/js/'); // JS CORE
	DEFINE('C_PHP','core/php/'); // PHP CORE
	DEFINE('DIR_BS','libs/bootstrap/'); // BOOTSTRAP	
	DEFINE('DIR_RS','public/resources/'); // RESOURCES
	DEFINE('VIEWS','public/views/'); // <-- VIEWS
	DEFINE('IMAGE','public/resources/images/'); // <-- IMAGES
	DEFINE('DATE',date('d-Y-m')); // Fecha Servidor 
	DEFINE('WEBSITE','Ancaor'); // Fecha Servidor 
	

	/* ---------------------------------------------------
		Enviamos los datos para Javascript
	--------------------------------------------------- */
	$datosjs = ["URL" => $this -> url ];
	// escribirDatos($datosjs);
	//Extensión .html o .htm
	DEFINE('EXT','phtml');
	/* ---------------------------------------------------
		Archivos necesario
	--------------------------------------------------- */

	//URLS 
	DEFINE('URL_PANEL',$this -> url.'panel/');
	DEFINE('URL_OTHER',$this -> url.'other/');	
	Session::init();
	DEFINE('SESSION', Session::exists());
	}
}
// echo __FILE__;