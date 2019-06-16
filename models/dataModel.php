<?php 
	require_once ('DAO/dataDAO.php');
	
	class dataModel {

		public function obtenerData(){
		  try{
				$dao = new dataDAO();
			    return $lista = $dao -> obtenerData();
		   }
		   catch(Exception $ex){
			   throw $ex;
		   }
		}   

		public function ConsulExisData($data){
			try {
				$dao = new dataDAO();
				$response = $dao -> ConsulExisData($data);
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}

		}

	}

?>