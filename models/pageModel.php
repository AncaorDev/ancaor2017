<?php 
	require_once ('DAO/pageDAO.php');
	//$insDAO = new indexDAO();
	class pageModel {

		static function obtenerPages(){
			try{
				$dao = new pageDAO();
			    return $lista = $dao -> obtenerPages();
			   			   // if(count($codigos)==0){
				  //  //Dispara un error hacia el controller
				  //  throw new Exception("Ud. debe seleccionar algunos registros para eliminar...");
			   // }
		   }
		   catch(Exception $ex){
			   throw $ex;
		   }
		}
		static function obtenerFilas(){
			try{
				$dao = new pageDAO();
			   	return $rows = $dao -> obtenerFilas();
			   			   // if(count($codigos)==0){
				  //  //Dispara un error hacia el controller
				  //  throw new Exception("Ud. debe seleccionar algunos registros para eliminar...");
			   // }
		   }
		   catch(Exception $ex){
			   throw $ex;
		   }
		}

		 public function obtenerPagina($page){
		  try {
		    $dao = new pageDAO();
			return $detallespage = $dao -> obtenerPagina($page);		 
		  }
		  catch(Exception $ex){
			  throw $ex;
		  }
		 }

		static function insertarPage($datos){
			try{
				$dao = new pageDAO();
				$response = $dao -> insertarPage($datos);
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

		static function modificarPage($datos){
			try{
				$dao = new pageDAO();
				$response = $dao -> modificarPage($datos);
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
		static function eliminarPage($dato){
			try{
				$dao = new pageDAO();
				$response = $dao -> eliminarPage($dato);
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

		public function ConsulExisPage($page){
			try {
				$dao = new pageDAO();
				$response = $dao -> ConsulExisPage($page);
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}

		}

		//Todos los Tipos de Pagina:
		public function TiposPaginas(){
			try {
				$dao = new pageDAO();
				$response = $dao -> TiposPaginas();
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}
		}
		//Solo un Tipo de Pagina por ID:
		public function TipoPaginaID($idtipopage){
			try {
				$dao = new pageDAO();
				$response = $dao -> TipoPaginaID($idtipopage);
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}
		}

		//Lista de Paginas en Completo Detalle
		public function detallesPage(){
			try {
				$dao = new pageDAO();
				$response = $dao -> DetallesPage();
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}
		}

		//Lista de Paginas en Completo Detalle
		public function detallestablePage(){
			try {
				$dao = new pageDAO();
				$response = $dao -> detallestablePage();
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}
		}
		
		//Lista de Paginas en Completo Detalle por Nombre
		public function detallesPagebyName($pagename){
			try {
				$dao = new pageDAO();
				$response = $dao -> detallesPagebyName($pagename);
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}
		}

		//setAutoincrement
		public function setAutoincrement($num){
			try {
				$dao = new pageDAO();
				$response = $dao -> setAutoincrement($num);
				return $response;				
			} catch (Exception $e) {
				throw $e;
			}
		}
	}


 ?>
