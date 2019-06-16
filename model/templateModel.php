<?php 
/**
* extends Model
*/
class pageModel 
{
	private $table;
	function __construct()
	{
		//Instanciamos la BD
		$this -> con = new gestionBD();
		$this -> table = "template";
	}
	public function listaPage()
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
	public function listaDetallesPage(){
		try {
			$sql = "";
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			// return $sql;
			$lista = $this -> con -> ejecutararray($sql);
			$statusTable = $this -> statusTable();
			$listaAttributePage = $this -> listaAttributePage();
			$compilated = array('datos' => $lista, 'status' => $statusTable, 'attributepage' => $listaAttributePage);
			return  $compilated;
		} catch (Exception $e) {
			throw $e;
		}
	}
	public function listaAttributePage(){
		try {
			$sql = "SELECT * FROM attributepage";
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
}