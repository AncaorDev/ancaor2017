<?php 
$datacontroller = 
'<?php
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
$p = "'.$nompage.'";
$c = "page";
$cv = new ControllerView($c);
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
?>';

?>