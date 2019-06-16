<?php 
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
// $bd => Si necesita usar la Base de datos true, caso contrario false
$p = "proyecto";
$c = "panel";
$bd = true;
$cv = new ControllerView($c,$bd);
$pm = new proyectoModel();
$var = $pm -> detallesProyecto(); 

if (isset($_GET['acts'])) {
	$action = $_GET['acts'];
	if ($action == '') {
		$cv -> renderPageVar($p,$var);
	} else {
		// echo $action;
		switch ($action) {
		case 'edit':
			if (isset($_GET['data'])) {
				$data = $_GET['data'];
				if ($data == '') {
					// header('Location:'.HOME.'panel/'.$p);
				} else {
					/* Función Mostrar los detalles de la Página , 
						Se requieren 5 datos : $c, $p y $dp.
						Siempre llevara informacion de las paginas, acción que se puede desactivar
						*/
					$cv -> renderDet(false,"",true,$p,"Id",$data);									
				}
			} else {
				$cv -> renderPageVar($p,$var);
			}
		break;
				
			default:
					$cv -> renderPageVar($p,$var);
			break;
			}
		}
} else {
	// var_dump($v);
	$cv -> renderPageVar($p,$var);
}
	
?>

