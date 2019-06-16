<?php
/* Código  generado automáticamente por LidPanel*/
/* ======================================================================
$c => Carpeta de vista
$p => Nombre de la Página 
$dp => Datos o Informacion desde la BD a la Página, si $bd esta descativada no enviara nada
$ctr => Instancia de Controller 
$bd => Si necesita usar la Base de datos true, caso contrario false
$auth => autenticación (booleano)
====================================================================== */
class ayudaController extends Controller {
private $c;
private $p;
private $dp;
private $ctr;
private $bd; 
private $auth;
function __construct(){
	$this -> c = "panel";
	$this -> p = "help";
	$this -> auth = true;
	$this -> bd = true;
	$this -> ctr = new Controller($this -> c, $this -> bd);
}

function mostrar() {
	if ($this -> authenticate($this -> auth)) {
		if (isset($_GET['action'])) {
			if ($_GET['action'] != "") {
				$this -> subAcceso($_GET['action']);
			} else {
				$this -> ctr -> renderPage($this -> p, "user", $_SESSION['id_User']);
			}
		} else {
			$this -> ctr -> renderPage($this -> p, "user", $_SESSION['id_User']);
		}
	} else {
		redirect('unautorized');
	}
}

function authenticate($acceso){
	if ($acceso) {
		if (SESSION) {
			if (isset($_SESSION['session'])) {
				if (($_SESSION['session'] == "yes")) {
					return true;
				} 
			}
		} 
	} else {
		return true;
	}
}
function subAcceso($dato){
	echo $dato;
	// if (file_exists('controllers/panel/'.$dato.'Controller.php')) {
	// 	include 'controllers/panel/'.$dato.'Controller.php';
	// 	$controller = $dato."Controller"; 
	// 	$page = new $controller();
	// 	$page -> mostrar(); 
	// } else {
	// 	echo "Error";
	// }
}
// Fin class
}
