<?php 
/**
* 
*/
class attributepageModel
{
	private $con;
	function __construct()
	{
		//Instanciamos la BD
		$this -> con = new gestionBD();
	}
	function listaAttributePage(){
		try {
			//Consulta
			$sql = "";
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			return  $lista = $this -> con -> ejecutararray($sql);		  
		}
			catch(Exception $ex){
			throw $ex;
		}
	}
	function listaDetallesPost(){
		try {
			//Consulta
			$sql = "SELECT * FROM post";
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			return  $lista = $this -> con -> ejecutararray($sql);		  
		}
			catch(Exception $ex){
			throw $ex;
		}
	}
	function modificarPost(){
		try {
			//Consulta
			$sql = "";
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			return  $lista = $this -> con -> ejecutararray($sql);		  
		}
			catch(Exception $ex){
			throw $ex;
		}
	}
	function eliminarPost(){
		try {
			//Consulta
			$sql = "";
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			return  $lista = $this -> con -> ejecutararray($sql);		  
		}
			catch(Exception $ex){
			throw $ex;
		}
	}
}