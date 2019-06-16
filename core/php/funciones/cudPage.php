<?php
if ($_POST) {
	$datos = [];
	// // Registramos todas las variables Post : Pendiente verificar si estan vacias las variables
	foreach($_POST as $nombre_campo => $valor){
		$patrones = array('/^\s*\s*$/' , '/\s+/' , '/(\W)/' , '/\_+/' , '/\-$/');
		$reemplazo = array('' ,'_', '', '-' ,  '');
		$valor = preg_replace($patrones, $reemplazo, $valor);
	  	$asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
	   	$datos[$nombre_campo] = $valor;
	   	eval($asignacion); 
	}
	$mPage = new pageModel();
	$action .= "Page";
	switch ($action) {
		case 'registrarPage':
			$rsp = $mPage -> registrarPage($datos);
			// $msg['sql'] = $rsp['sql'];
			$msg['sql'] = $rsp;
			$msg['rst'] = $action;
			$msg['slug'] = $datos;
		break;
		case 'actualizarPage':
			// $rsp = $mPage -> actualizarPage($datos);
			// $msg['sql'] = $rsp['sql'];
			// $msg['upd'] = $rsp['upd'];
			$msg['rst'] = $action;
		break;
		case 'eliminarPage':
			// $rsp = $mPage -> eliminarPage($datos);
			// $msg['sql'] = $rsp['sql'];
			// $msg['upd'] = $rsp['upd'];
			$msg['rst'] = $action;
		break;
		default:

		break;
	}
	echo json_encode($msg);	
}