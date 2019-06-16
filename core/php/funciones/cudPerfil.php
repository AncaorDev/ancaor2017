<?php
if ($_POST) {
	$datos = [];
	// Registramos todas las variables Post : Pendiente verificar si estan vacias las variables
	foreach($_POST as $nombre_campo => $valor){
	   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
	   $datos[$nombre_campo] = trim(addslashes($valor));
	   eval($asignacion); 
	}
	// act = actData, actCover, actProfile
	$mUser = new userModel();
	switch ($action) {
		case 'actData':
			$rsp = $mUser -> actualizarUser($datos);
			$msg['sql'] = $rsp['sql'];
			$msg['upd'] = $rsp['upd'];
		break;
		case 'actCover':
			$rsp = $mUser -> actualizarImgUser($datos);
			$msg['sql'] = $rsp['sql'];
			$msg['upd'] = $rsp['upd'];
		break;
		case 'actProfile':
			$rsp = $mUser -> actualizarImgUser($datos);
			$msg['sql'] = $rsp['sql'];
			$msg['upd'] = $rsp['upd'];
		break;
		default:

		break;
	}
	echo json_encode($msg);	
}