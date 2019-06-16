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
class galeriaController extends Controller {
private $c;
private $p;
private $dp;
private $ctr;
private $bd; 
private $auth;
function __construct(){
	$this -> c = "panel";
	$this -> p = "galeria";
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
				$this -> ctr -> renderPage($this -> p);
			}
		} else {
			$this -> ctr -> renderPage($this -> p);
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
function subAcceso($e){
	switch ($e) {
		case 'imagenes':
			if (isset($_GET['dato'])) {
				if ($_GET['dato'] != "") {
					redirect('panel/'. $this -> p);
				} else {
					$this -> ctr -> renderPage($e);
				}		
			} else {
				$this -> ctr -> renderPage($e);
			}
		break;
		case 'videos':
			if (isset($_GET['dato'])) {
				if ($_GET['dato'] != "") {
					redirect('panel/'. $this -> p);
				} else {
					$this -> ctr -> renderPage($e);
				}		
			} else {
				$this -> ctr -> renderPage($e);
			}
		break;
		default:
			redirect('panel/'. $this -> p);
		break;
	}
}
// Fin class
}
