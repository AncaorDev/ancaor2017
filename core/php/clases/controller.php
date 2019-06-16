<?php 
/*===========================================
   Controller
===========================================*/
/* 
Clase que se encarga de recibir los datos según eso mostrar sus vistas correspondientes 
con la información adecuada.
*/
class Controller {
/*  
	Leyenda de las variables
	$c => Carpeta.
	$p => Page.
	$dp => Datos de la Página.
	$dpn => Datos de la Página por el Nombre.	
	$mp => Modelo de la Página.
	$rsp => Respuesta de los Funciones Modelo.
	$v => Vista (Ruteado según Datos).
	$lp => Lista de páginas.
*/
private $c;
private $dp;
private $dpn;
private $mp;
private $rsp;
private $v;
private $det;
private $bd;
private $lp;

// Método constructor, la funcion se ejecutara al instanciarla.
public function __construct($c = "page",$bd = true) {
	$this -> bd = $bd;
	if ($this -> bd) {
		$modelDefault = "pageModel";
		if (class_exists($modelDefault)) {
			$this -> mp = new pageModel();
			$this -> lp = $this -> mp -> listaPage();
			$this -> v = new View();
			$this -> c = $c;
		} else {
			echo "Not defined name class in the model </br>";
		}
		
		
	} else {
		$this -> v = new View();
		$this -> c = $c;
	}
} 

/* Función Mostrar Página con la lista general
 	Se requieren 4 datos : $p, $data, $id y $data2.
*/
public function renderPage($p, $data = "post", $id = "" , $data2 = "") {
	try {		
		if ($this -> bd) {
			$model = strtolower($data)."Model";
			if (class_exists($model)) {
				$datamodel = new $model();
				$actlistadetalles = "listaDetalles".ucfirst($data);
				$listadetallesdata = $datamodel -> $actlistadetalles($id);			
				$this -> v -> renderPage($this -> c , $p , $this -> lp , $listadetallesdata);
			} else {
				echo "Not defined name class in the model </br>";
			}			
		}	else {
			$this -> v -> renderPage($this -> c , $p);
		}
	} catch (Exception $e) {
		throw $e;
	}
}

/* Función Mostrar Página con datos segun Id
 	Se requieren 4 datos : $p, $d, $data y $data2.
*/
public function renderPageId($p, $data = "post",$data2 = "") {
	try {
		if ($this -> bd) {
			$model = strtolower($data)."Model";
			if (class_exists($model)) {
				$datamodel = new $model();
				$actlistadetalles = "listaDetalles".ucfirst($data);
				$listadetallesdata = $datamodel -> $actlistadetalles();			
				$this -> v -> renderPage($this -> c , $p , $this -> lp , $listadetallesdata);
			} else {
				echo "Not defined name class in the model </br>";
			}			
		}	else {
			$this -> v -> renderPage($this -> c , $p);
		}
	} catch (Exception $e) {
		throw $e;
	}
}
/* Función Mostrar los detalles de la Página , 
	Se requieren 
	Simpre llevara informacion de las paginas, accion que se puede desactivar
*/
public function renderById($m1,$d) {
	try {		
		$model = strtolower($m1)."Model";
		$datamodel = new $model();
		$det = 'listaDetalles'.ucfirst($m1).'ById';
		$dataById = $datamodel -> $det($d);
		if (isset($dataById['datos']['std'])) {
			redirect('panel/'.$d);
			//$dataById['datos']['error'];
		} else {
			if (count($dataById['datos']) > 0) {
				$this -> v -> renderById($this-> c, $m1,$dataById,$this -> lp);
			}else {
				redirect('panel/'.$d);
			}	
		}
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

}
?>