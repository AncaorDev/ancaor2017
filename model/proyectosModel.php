<?php 
/**
* extends Model
*/
class proyectosModel 
{
	private $table;
	private $crudHTML;
	function __construct()
	{
		//Instanciamos la BD
		$this -> con = new gestionBD();
		$this -> crudHTML = new crudHTML();
		$this -> table = "proyectos";
	}
	public function listaProyectos()
	{
		try {
			$sql = "SELECT * FROM ".$this -> table;
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			return  $lista = $this -> con -> ejecutararray($sql);	
		} catch (Exception $e) {
			throw $e;
		}
	}
	public function listaProyectosId()
	{
		try {
			$sql = "SELECT idDepa FROM ".$this -> table." GROUP BY idDepa";
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			return  $lista = $this -> con -> ejecutararray($sql);	
		} catch (Exception $e) {
			throw $e;
		}
	}

	public function listaExistProyecto($idDepa)
	{
		try {
			$sql = "SELECT * FROM ".$this -> table." WHERE idDepa=".$idDepa;
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			return  $lista = $this -> con -> ejecutararray($sql);	
		} catch (Exception $e) {
			throw $e;
		}
	}

	public function listaProyectosDepa()
	{
		try {
			$sql = "SELECT * FROM ".$this -> table." GROUP BY idDepa";
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			return  $lista = $this -> con -> ejecutararray($sql);	
		} catch (Exception $e) {
			throw $e;
		}
	}

	public function listaDetallesProyectos(){
		try {
			$sql = "SELECT proyectos.idProy, proyectos.nameProy, proyectos.descripProy , ubdepartamento.departamento, ubprovincia.provincia, ubdistrito.distrito FROM proyectos INNER JOIN ubdepartamento ON proyectos.idDepa=ubdepartamento.idDepa INNER JOIN ubprovincia ON proyectos.idProv=ubprovincia.idProv INNER JOIN ubdistrito ON proyectos.idDist=ubdistrito.idDist ORDER BY proyectos.idProy ASC";
			// $sql = "SELECT proyectos.idProy, proyectos.descripProy , ubdepartamento.departamento FROM proyectos INNER JOIN ubdepartamento ON proyectos.idDepa=ubdepartamento.idDepa ORDER BY proyectos.idProy ASC";
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			// return $sql;
			$lista = $this -> con -> ejecutararray($sql);
			$statusTable = $this -> statusTable();
			$listaDepartamentos = $this -> listaDepartamentos();
			$compilated = array('datos' => $lista, 'status' => $statusTable, 'departamentos' => $listaDepartamentos);
			return  $compilated;
		} catch (Exception $e) {
			throw $e;
		}
	}
	public function listaDetallesProyectosbyId($id){
		try {
			// $sql = "SELECT proyectos.idProy, proyectos.nameProy, proyectos.descripProy , ubdepartamento.departamento,ubdepartamento.idDepa, ubprovincia.provincia,ubprovincia.idProv, ubdistrito.distrito,ubdistrito.idDist FROM proyectos INNER JOIN ubdepartamento ON proyectos.idDepa=ubdepartamento.idDepa INNER JOIN ubprovincia ON proyectos.idProv=ubprovincia.idProv INNER JOIN ubdistrito ON proyectos.idDist=ubdistrito.idDist WHERE idProy=".$id;
			$sql = "SELECT proyectos.idProy, proyectos.descripProy , ubdepartamento.departamento,ubdepartamento.idDepa FROM proyectos INNER JOIN ubdepartamento ON proyectos.idDepa=ubdepartamento.idDepa WHERE idProy=".$id;
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			// return $sql;
			$lista = $this -> con -> ejecutararray($sql);
			$statusTable = $this -> statusTable();
			$listaDepartamentos = $this -> listaDepartamentos();
			$compilated = array('datos' => $lista, 'status' => $statusTable, 'departamentos' => $listaDepartamentos);
			return  $compilated;
		} catch (Exception $e) {
			throw $e;
		}
	}
	public function listaDepartamentos(){
		try {
			$sql = "SELECT * FROM ubdepartamento";
			return  $lista = $this -> con -> ejecutararray($sql);	
		} catch (Exception $e) {
			throw $e;
		}
	}
	public function statusTable(){
		try {
			$sql = "SHOW TABLE STATUS LIKE '".$this -> table."'";
			return  $lista = $this -> con -> ejecutararray($sql);	
		} catch (Exception $e) {
			throw $e;
		}
	}
	public function registrarProyecto($datos){
		try {
			$sql = "INSERT INTO proyectos (descripProy,idDepa) VALUES ("
			."'".$datos['descripProy']."',"
			."'".$datos['idDepa']."')";
			$sql = $this -> con -> ejecutar($sql);
			if ($sql) {
				$id = $this -> con -> lastId();
				$html = $this -> crudHTML -> crearHtml($id);
				$response = ['sql' => $sql,
							'msg-html' => $html['msg'],
							'std-html' => $html['std'],
							'idProy' => $id];
			} else {
				$response = ['sql' => $sql,
							'msg-html' => 'No se ejecuto',
							'std-html' => false];
			}		
			return  $response;	
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	public function actualizarProyecto($datos){
		try {
			$sql = 'UPDATE proyectos SET descripProy = "'.$datos['descripProy'].'" WHERE idProy='.$datos['idProy'];
			$sql = $this -> con -> ejecutar($sql);
			if ($sql) {
				$html = $this -> crudHTML -> comprobarHtml($datos['idProy']);
				$response = ['sql' => $sql,
							'msg-html' => $html['msg'],
							'std-html' => $html['std']];
			} else {
				$response = ['sql' => $sql,
							'msg-html' => $sql,
							'std-html' => false];
			}		
			return  $response;	
		} catch (Exception $e) {
			throw $e;
		}
	}
	

	public function eliminarProyecto($datos){
		try {
			$sql = 'DELETE FROM proyectos WHERE idProy='.$datos['idProy'];
			$sql = $this -> con -> ejecutar($sql);
			if ($sql) {
				$html = $this -> crudHTML -> eliminarHtml($datos['idProy']);
				$response = ['sql' => $sql,
							'msg-html' => $html['msg'],
							'std-html' => $html['std']];
			} else {
				$response = ['sql' => $sql,
							'msg-html' => $sql,
							'std-html' => false];
			}		
			return  $response;	
		} catch (Exception $e) {
			throw $e;
		}
	}

	public function setAutoIncrement($datos){
		try {
			if ($datos['mode'] == 'auto') {
				$num = 0;
			} else if ($datos['mode'] == 'manual') {
				$num = $datos['num'];
			}
			$sql = "ALTER TABLE ".$this -> table." AUTO_INCREMENT =".$num;
			$sql = $this -> con -> ejecutar($sql);
			if ($sql) {
				$msg = 'Ejecución Correcta';
			} else {
				$msg = 'Error en la Ejecución';
			}	
			$data = array('sql' => $sql ,'msg-html' => $msg, 'std-html' => $sql);
			return $data;				
		} catch (Exception $e) {
			throw $e;
		}
	}

	function __destruct() {
       	if (isset($sql)) {
       		$this -> con -> liberar($sql);
       	}       	
   }
}

