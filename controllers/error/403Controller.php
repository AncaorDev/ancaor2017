<?php
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
// $bd => Si necesita usar la Base de datos true, caso contrario false
$p = "error403";
$c = "error";
$bd = false;
$cv = new ControllerView($c,$bd);
if (isset($_GET["subpage"])) {
	$data = $_GET["subpage"];
	if ($data == "") {
			$cv -> renderpage($p);
	} else {
		$cv -> renderDetPage($data);
	}
} else {	
	$cv -> renderpage($p);
}
?>