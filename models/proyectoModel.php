<?php 
	require_once ('DAO/proyectoDAO.php');
	//$insDAO = new indexDAO();
	class proyectoModel {

		static function obtenerProyecto(){
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
				$dao = new proyectoDAO();
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

		static function detallesProyectobyId($id){
			try{
				$dao = new proyectoDAO();
			    return $lista = $dao -> detallesProyectobyId($id);
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
				$dao = new proyectoDAO();
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

		static function insertarProyecto($datos){
			try{
				$dao = new proyectoDAO();
				$response = $dao -> insertarProyecto($datos);
				return $response;
			   	// if(count($codigos)==0){
				//  //Dispara un error hacia el controller
				//  throw new Exception("Ud. debe seleccionar algunos registros para eliminar...");
			   // }
		   }
		   catch(Exception $ex){
			   throw $ex;
		   }
		}

		static function modificarProyecto($datos){
			try{
				$dao = new proyectoDAO();
				$response = $dao -> modificarProyecto($datos);
				return $response;
			   	// if(count($codigos)==0){
				//  //Dispara un error hacia el controller
				//  throw new Exception("Ud. debe seleccionar algunos registros para eliminar...");
			   // }
		   }
		   catch(Exception $ex){
			   throw $ex;
		   }
		}
		static function eliminarProyecto($dato){
			try{
				$dao = new proyectoDAO();
				$response = $dao -> eliminarProyecto($dato);
				return $response;
			   	// if(count($codigos)==0){
				//  //Dispara un error hacia el controller
				//  throw new Exception("Ud. debe seleccionar algunos registros para eliminar...");
			   // }
		   }
		   catch(Exception $ex){
			   throw $ex;
		   }
		}

		public function ConsulExisProyecto($proyecto){
			try {
				$dao = new proyectoDAO();
				$response = $dao -> ConsulExisProyecto($proyecto);
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}

		}

		//Todos los Tipos de Pagina:
		public function TiposProyecto(){
			try {
				$dao = new proyectoDAO();
				$response = $dao -> TiposProyecto();
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}
		}
		//Solo un Tipo de Pagina por ID:
		public function TipoProyectoID($idtipoproyecto){
			try {
				$dao = new proyectoDAO();
				$response = $dao -> TipoProyectoID($idtipoproyecto);
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}
		}

	}


 ?>
