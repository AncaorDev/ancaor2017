<?php 
$obtener = $_POST['obt'];
if ($obtener == "departamento") {
	$np = $_POST['idDepa'];
	$obtModel = new obtenerModel();
	$response['ldepa'] = $obtModel -> obtenerProvincia($np);
	$response['msg'] = "Llego a obtener.php y el ID del departamento es $np";
	echo json_encode($response);
} else if ($obtener == "provincia") {
	$np = $_POST['idDist'];
	$obtModel = new obtenerModel();
	$response['ldist'] = $obtModel -> obtenerDistrito($np);
	$response['msg'] = "Llego a obtener.php y el ID de la Provincia es $np";
	echo json_encode($response);
} else if ($obtener == "detalle") {
	$np = $_POST['idDepa'];
	$obtModel = new proyectosModel();
	$data = $obtModel -> listaExistProyecto($np);
	
	if (count($data)>0) {
		$response['exist'] = $data[0];
	} else {
		$response['exist'] = 0;
	}
	
	$response['msg'] = "llego a verificar existencia";
	echo json_encode($response);
}