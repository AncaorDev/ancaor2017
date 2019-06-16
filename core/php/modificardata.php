<?php 
$pageModel = new pageModel();

$nompage = $_POST['nompage'];
$iduser = $_POST['iduser'];
$datapage = $_POST['datapage'];
$tipopage = $_POST['tipopage'];
$nomeditpage = $_POST['nomeditpage'];


if ($tipopage == 1) {
	$link_Pagina = HOME.strtolower($nompage);
	$phtml = $datapage.'.phtml';
} else if ($tipopage == 2){
	$link = $_POST['link'];
	$part = "http://";
	$phtml = "";
	$pos = strpos($link, $part);
	if ($pos === false) {
		$link_Pagina = $part . $link;
	} else {
		$link_Pagina = $link;
	}
	
}

$datos = array('nom_Pagina' => $nompage ,
 'cuerpo_Pagina' => $phtml, 
 'id_User' => $iduser , 
 'id_TipoPagina' => $tipopage,
 'link_Pagina' => $link_Pagina,
 'nomeditpage' => $nomeditpage);


$message['estado'] = true;
$message_success = '<div class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p>Pagina modificada correctamente  y se redireccionara en <span id="tred"> <span></p>
</div>';
$message_danger = '<div class="alert alert-dismissible alert-danger">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p>Error</p>
</div>';
$message_warning = '<div class="alert alert-dismissible alert-warning">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p>Pagina ya existe y perdiste 10 segundos de tu vida , redireccionando en <span id="tred"> <span></p>
</div>';
// stdexis = false => no hay duplicados
// stdSql = false; => fallo la consulta
// stdCtr = false; => no crea controlador
// controlador = false; => no llega a la libreria controlador
// page = false; => no llega a la libreria controlador
// datapage = false; => no llega a la libreria controlador
// xform => cerrar form

if ($message['estado']) {
	$result = $pageModel -> modificarPage($datos);
	// $result['stdSql'];
	// $result['stdCtr'];
	$message['controlador'] = $result['controlador'];
	$message['page'] = $result['page'];
	$message['datapage'] = $result['datapage'];
	$message['stdexis'] = $result['stdexis'];
	$message['stdSql'] = $result['stdSql'];
	if ($result['form']) {
		$message['xform'] = true;
		$message['mensaje'] = $message_warning;
	} else {
		$message['xform'] = false;
		$message['mensaje'] =  $message_success;
	}
	echo json_encode($message);
}


?>