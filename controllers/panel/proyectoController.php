<?php 
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
$p = "proyectos";
$c = "panel";
$cv = new ControllerView($c);
$pm = new proyectoModel();
$var = $pm -> detallesProyecto(); 
if (isset($_GET['acts'])) {

} else {
	// var_dump($v);
	$cv -> renderPageVar($p,$var);
}
	

 ?>