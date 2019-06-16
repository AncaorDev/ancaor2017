<?php 
$pageModel = new pageModel();

$nompage = $_POST['nompage'];



$datos = array('nom_Pagina' => $nompage);


$message['estado'] = true;

if ($message['estado']) {
	$result = $pageModel -> eliminarPage($datos);
	$message['msg'] = "Llego a eliminar data";
	$message['sql'] = $result['sql'];
	$message['rows'] = $result['rows'];
	$message['ctr'] = $result['ctr'];
	echo json_encode($message);
}


?>