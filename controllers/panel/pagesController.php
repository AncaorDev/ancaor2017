<?php 
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
$p = "pages";
$c = "panel";
$cv = new ControllerView($c);
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
						$cv -> renderDetPage($data);
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