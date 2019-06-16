<?php 
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
$p = "proyectos";
$c = "panel";
$cv = new ControllerView($c);
if (isset($_GET['acts'])) {

} else {
	$cv -> renderPage($p);
}
	

 ?>