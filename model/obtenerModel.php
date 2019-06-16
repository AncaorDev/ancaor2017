<?php 
class obtenerModel{
	function __construct()
	{
		//Instanciamos la BD
		$this -> con = new gestionBD();
	}
	public function obtenerProvincia($idProv)
	{
		try {
			$sql = "SELECT * FROM ubprovincia WHERE idDepa=$idProv";
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			return  $lista = $this -> con -> ejecutararray($sql);	
		} catch (Exception $e) {
			throw $e;
		}
	}
	public function obtenerDistrito($idDist)
	{
		try {
			$sql = "SELECT * FROM ubdistrito WHERE idProv=$idDist";
			//Ejecución de consulta
			//$ejePagina = $con -> ejecutar($sql);	
			return  $lista = $this -> con -> ejecutararray($sql);	
		} catch (Exception $e) {
			throw $e;
		}
	}
}

?>