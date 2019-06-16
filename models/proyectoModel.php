<?php 
	require_once ('DAO/proyectosDAO.php');
	//$insDAO = new indexDAO();
	class proyectoModel {

		static function obtenerProyectos(){
			try{
				$dao = new proyectosDAO();
			    return $lista = $dao -> obtenerProyectos();
			   			   // if(count($codigos)==0){
				  //  //Dispara un error hacia el controller
				  //  throw new Exception("Ud. debe seleccionar algunos registros para eliminar...");
			   // }
		   }
		   catch(Exception $ex){
			   throw $ex;
		   }
		}
		
		static function detallesProyecto(){
			try{
				$dao = new proyectosDAO();
			    return $lista = $dao -> detallesProyecto();
			   			   // if(count($codigos)==0){
				  //  //Dispara un error hacia el controller
				  //  throw new Exception("Ud. debe seleccionar algunos registros para eliminar...");
			   // }
		   }
		   catch(Exception $ex){
			   throw $ex;
		   }
		}

		static function tecnologiasById($id){
			try{
				$dao = new proyectosDAO();
			    return $lista = $dao -> tecnologiasById($id);
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


 ?>
