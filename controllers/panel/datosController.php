<?php 
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
// $bd => Si necesita usar la Base de datos true, caso contrario false
$p = "datos";
$c = "panel";
$bd = true;
$cv = new ControllerView($c,$bd);
if (isset($_GET['action'])) {
	$subpage = $_GET['action'];
	if ($subpage == '') {
		header('Location:'.HOME.'panel/'.$p);
	} else {
		$exis = $cv -> ConsulExisData($subpage);
		if ($exis) {
			if (file_exists("controllers/panel/".strtolower($subpage)."Controller.php")) {
				include "controllers/panel/".strtolower($subpage)."Controller.php";
			} else {
				header('Location:'.HOME.'panel/'.$p);
			}
		} else {
			header('Location:'.HOME.'panel/'.$p);
		}			
	}
} else {
	$cv -> renderPage($p);
}
	

 ?>