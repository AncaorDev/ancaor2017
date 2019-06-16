<?php 
	require_once ('DAO/logDAO.php');
	//$insDAO = new indexDAO();
	class logModel { 
		public function login($user,$pass,$sesion){
			try{
				$dao = new logDAO();
			    return $lista = $dao -> login($user,$pass,$sesion);
			   			   // if(count($codigos)==0){
				  //  //Dispara un error hacia el controller
				  //  throw new Exception("Ud. debe seleccionar algunos registros para eliminar...");
			   // }
		   }
		   catch(Exception $ex){
			   throw $ex;
		   }
		}
	}