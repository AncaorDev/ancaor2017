<?php 
	Session::init();
	Session::destroy();
	$mensaje['estadosql'] = false;
	$mensaje['duracion'] = false;
	$mensaje['ses'] = false;
	$mensaje['std']	= true;
	$mensaje['msg']	= "Cerrando Sesión";
	echo json_encode($mensaje);
?>