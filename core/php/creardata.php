<?php 
	$message['std'] = true;
	$message['respuesta'] = "Llegue a crear data";
	$message['html'] = $_POST['phtml'];
	$html = $_POST['phtml'];
	$message['page'] = $_POST['nompage'];
	$page = $_POST['nompage'];
	$nombre_phtml = $page;
	//Modificar la ruta del proyecto
	$path = 'C:\\xampp\\htdocs\\'.DIR_CONTROLLER.'\views\\page\\data\\data-'.$nombre_phtml.'.phtml';
	if (file_exists($path)) {
		$message['ex'] = "existe";
		$message['expage'] = $path;
		$std = fopen($path, "w+");
		if (fwrite($std, $html)) {
			$message['stdpage'] = "Modificado Correctamente";
		} else {
			$message['stdpage'] = "Error al modificar";
		}
		fclose($std);
	} else {
		$message['ex'] = "no existe";
		$message['expage'] = $path; 
	}
	echo json_encode($message);

?>