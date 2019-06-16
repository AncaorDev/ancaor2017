<?php 
$pageModel = new pageModel();

$nompage = $_POST['nompage'];
$iduser = $_POST['iduser'];
$datapage = $_POST['datapage'];
$tipopage = $_POST['tipopage'];


if ($tipopage == 1) {
	$link_Pagina = HOME.strtolower($nompage);
	$phtml = $datapage.'.phtml';
} else if ($tipopage == 2){
	$link = $_POST['link'];
	$http = "http://";
	$https = "https://";
	$phtml = "";
	$pos = strpos($link, $http);
	$pos1 = strpos($link, $https);
	if ($pos === false) {
		if ($pos1 === false) {
			$link_Pagina = $http . $link;
		}
	} else {
		$link_Pagina = $link;
	}
	
}

$datos = array('nom_Pagina' => $nompage ,
 'cuerpo_Pagina' => $phtml, 
 'id_User' => $iduser , 
 'id_TipoPagina' => $tipopage,
 'link_Pagina' => $link_Pagina);


$message['estado'] = true;
$message['page'] = "Llego a insertar data mod";
$message_success = '<div class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p>Pagina creada correctamente y se redireccionara en <span id="tred"> <span></p>
</div>';
$message_danger = '<div class="alert alert-dismissible alert-danger">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p>Error</p>
</div>';
$message_warning = '<div class="alert alert-dismissible alert-warning">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p>Pagina ya existe y perdiste 10 segundos de tu vida</p>
</div>';
// stdexis = false => no hay duplicados
// stdSql = false; => fallo la consulta
// stdCtr = false; => no crea controlador
// controlador = false; => no llega a la libreria controlador
// page = false; => no llega a la libreria controlador
// datapage = false; => no llega a la libreria controlador
// xform => cerrar form

if ($message['estado']) {
	$result = $pageModel -> insertarPage($datos);
	// $result['stdSql'];
	// $result['stdCtr'];
	$message['controlador'] = $result['controlador'];
	$message['page'] = $result['page'];
	$message['datapage'] = $result['datapage'];
	$message['stdexis'] = $result['stdexis'];
	if ($result['stdexis']) {
		$message['xform'] = true;
		$message['mensaje'] = $message_warning;
	} else {
		$message['xform'] = false;
		$message['mensaje'] = $message_success;		
	}
	echo json_encode($message);
}


?>