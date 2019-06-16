<?php 

	class dataDAO {

		private $con;
		public function __construct() {
			//Instanciamos la BD
			$this -> con = new gestionBD();
		}
		public function obtenerData(){
		  try {
				//Consulta
				$sql = "SELECT * FROM dato";
				//Ejecución de consulta
				//$ejePagina = $con -> ejecutar($sql);	
				return  $lista = $this -> con -> ejecutararray($sql);		  
			}
			catch(Exception $e){
				throw $e;
			}
		 }

		public function ConsulExisData($data){
		 	$ddata = ucfirst(strtolower($data));
		 	$sql = "SELECT * FROM dato WHERE nom_Dato='".$ddata."'";
		 	$rows = $this -> con -> filasrow($sql);
		 	if ($rows == 0) {
		 		$rows = false;
		 	} else if ($rows > 0) {
		 		$rows = true;
		 	}
		 	return $rows;
		 }
		 
		 public function __destruct () {
		 	try {
		 		$this -> con -> cerrar();
		 	} catch (Exception $e) {
		 		throw $e;
		 	}
		 } 

	}

 ?>