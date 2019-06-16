<?php 
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
// $bd => Si necesita usar la Base de datos true, caso contrario false
$p = "tecnologias";
$c = "panel";
$bd = true;
$cv = new ControllerView($c,$bd);
if (isset($_GET['acts'])) {

} else {
	$cv -> renderPage($p);
}
	

 ?>