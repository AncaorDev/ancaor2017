<?php 
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
// $bd => Si necesita usar la Base de datos true, caso contrario false
$p = "pages";
$c = "panel";
$bd = true;
$cv = new ControllerView($c,$bd);
if (isset($_GET['action'])) {
	$action = $_GET['action'];
	if ($action == '') {
		header('Location:'.HOME.'panel/'.$p);
	} else {
		switch ($action) {
		case 'edit':
			if (isset($_GET['data'])) {
				$data = $_GET['data'];
				if ($data == '') {
					header('Location:'.HOME.'panel/'.$p);
				} else {
					$exis = $cv -> ConsulExisPage($data);
					if ($exis) {
						/* Función Mostrar los detalles de la Página , 
							Se requieren 6 datos : 
							Siempre llevara informacion de las paginas, accion que se puede desactivar
						*/
						$cv -> renderDet(true,$data,false,$p,"","");
					} else {
						header('Location:'.HOME.'panel/'.$p);				
					}					
				}
			} else {
				header('Location:'.HOME.'panel/'.$p);
			}
			break;
				
			default:
					header('Location:'.HOME.'panel/'.$p);
			break;
			}
		}
	} else {
		$cv -> renderPage($p);
	}
	

 ?>