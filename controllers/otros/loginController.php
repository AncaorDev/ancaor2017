<?php
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
// $bd => Si necesita usar la Base de datos true, caso contrario false
$p = "login";
$c = "login";
$bd = false;
$cv = new ControllerView($c,$bd);
if (isset($_GET["subpage"])) {
	$data = $_GET["subpage"];
	if ($data == "") {
			$cv -> renderpage($p);
	} else {
		$cv -> renderDet(false,$data,false,"","");
	}
} else {	
	$cv -> renderpage($p);
}
?>