<?php
/* ======================================================================
$c => Carpeta
$p => Página
$dp => Datos de la Página
$ctr => Instancia del Controller 
$bd => Si necesita usar la Base de datos true, caso contrario false
$auth => autenticación
====================================================================== */
class error404Controller  extends Controller {
private $c;
private $p;
private $dp;
private $ctr;
// private $bd; 
private $auth;
function __construct(){
	$this -> c = "error";
	$this -> p = "404";
	$this -> auth = false;
	$this -> bd = false;
	$this -> ctr = new Controller($this -> c, $this -> bd);
}

function mostrar() {
	if ($this -> auth($this -> auth)) {
		if (isset($_GET['subpage'])) {
			//Lo que se hará si existe una subpágina 
		} else {
			$this -> ctr -> renderPage($this -> p);
		}
	} else {
		echo "Esta página requiere autenticación";
	}
}

function auth($acceso){
	if ($acceso) {
		$sesion = Session::exists();
		if ($sesion) {
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

}
