<?php 
//-----------------------------------------//
//------------  Controller  ---------------//
//-----------------------------------------//

/* 
Clase que se encarga de recibir los datos según eso mostrar sus vistas correspondientes 
con la información adecuada.
*/
class ControllerView {
/*  
	Leyendo de las variables
	$c => Carpeta.
	$p => Page.
	$dp => Datos de la Página.
	$dpn => Datos de la Página por el Nombre.	
	$mp => Modelo de la Página.
	$md => Modelo de Datos.
	$rsp => Respuesta de los Funciones Modelo.
	$v => Vista (Ruteado según Datos).
*/
private $c;
private $dp;
private $dpn;
private $mp;
private $md;
private $rsp;
private $v;

// Método mágico constructor, la funcion se ejecutara al instanciarla.
public function __construct($c) {
	$this -> mp = new pageModel();
	$this -> md = new dataModel();
	$this -> v = new View();
	$this -> c = $c;
	$this -> dp = $this -> mp -> detallesPage();
} 

/* Función Mostrar Página , 
	Se requieren 3 datos : $c, $p y $dp.
*/
public function renderPage($p) {
	try {
		$this -> v -> renderPage($this -> c , $p , $this -> dp);	
	} catch (Exception $e) {
		throw $e;
	}
}

/* Función Mostrar Página con un valor agregado, 
	Se requieren 3 datos : $c, $p y $dp.
*/
public function renderPageVar($p,$var) {
	try {
		$this -> v -> renderPageVar($this -> c , $p , $this -> dp,$var);	
	} catch (Exception $e) {
		throw $e;
	}
}

/* Función Mostrar los detalles de la Página , 
	Se requieren 3 datos : $c, $p y $dp.
*/
public function renderDetPage($dato) {
	try {
		$this -> dpn = $this -> mp -> detallesPagebyName($dato);
		$this -> v -> renderDetPage($this -> dp , $this -> dpn);
	} catch (Exception $e) {
		throw $e;
	}
}

public function MostrarDataPage($dato) {
	try {
		$datosproyecto = $dato;
		//Extraer informacion de proyectos
		// $this -> datosproyecto = proyectosModel::obtenerProyecto($dato);	if($this -> datosproyecto){}
		View::renderdatapage('page', $this -> c, $this -> datospages, $datosproyecto);
	} catch (Exception $e) {
		throw $e;
	}
}

public function ConsulExisPage($page){
	try {
		$rsp = $this -> mp -> ConsulExisPage($page);
		return $rsp;				
	} catch (Exception $e) {
		throw $e;
	}

}

public function ConsulExisData($data){
	try {
		$rsp = $this -> md -> ConsulExisData($data);
		return $rsp;				
	} catch (Exception $e) {
		throw $e;
	}

}

}
?>