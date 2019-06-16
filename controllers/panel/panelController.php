<?php 
Session::init();
// $c => Carpeta
// $p => Page
// $dp => Datos de la Página
// $cv => Instancia del Controller View 
// $bd => Si necesita usar la Base de datos true, caso contrario false
// $bd => Si necesita usar la Base de datos true, caso contrario false
$p = "panel";
$c = "panel";
$bd = true;
$cv = new ControllerView($c,$bd);
$sesion = Session::exists();
if ($sesion) {
	// $sesion = Session::destroy();	
	if (isset($_SESSION['session'])) {
		if ($_SESSION['session'] == "yes") {
		 	if (isset($_GET['subpage'])) {
				$dataprincipal = $_GET['subpage'];
				if ($dataprincipal == '') {
					header('Location:'.HOME.'panel');
				} else {
					switch ($dataprincipal) {
						case 'pages':
							include RUTE.'controllers/panel/'.$dataprincipal.'Controller.php';
						break;
							
						case 'datos':
							include RUTE.'controllers/panel/'.$dataprincipal.'Controller.php';
						break;

						case 'includes':
							include RUTE.'controllers/panel/'.$dataprincipal.'Controller.php';
						break;

						default:
							header('Location:'.HOME.'panel');
						break;
					}
				}
			} else {		
				$cv -> renderPage($p);
			}
		} else {
			include RUTE.'controllers/otros/loginController.php';
		}
	} else {
		include RUTE.'controllers/otros/loginController.php';
	}
} else {	
	if (isset($_GET['subpage'])) {
		header('Location:'.HOME.'panel');
	} 
	include RUTE.'controllers/otros/loginController.php';
}
	
?>
