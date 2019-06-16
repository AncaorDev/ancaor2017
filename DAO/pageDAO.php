<?php 
	class pageDAO {
		private $con;
		public function __construct() {
			$this -> con = new gestionBD();
		}
		public function obtenerPages(){
		  try {
		     	//Instanciamos la BD
				
				//Consulta
				$sql = "SELECT * FROM pagina";
				//Ejecución de consulta
				//$ejePagina = $con -> ejecutar($sql);	
				return  $lista = $this -> con -> ejecutararray($sql);		  
		  }
		  catch(Exception $ex){
			  throw $ex;
		  }
		 }
		 public function obtenerFilas(){
		  try {
		     	
				//Consulta
				$sql = "SELECT * FROM pagina";
				//Ejecución de consulta
				$ejePagina = $this -> con -> ejecutar($sql);	
				return  $rows = $this -> con -> filas($ejePagina);		  
		  }
		  catch(Exception $ex){
			  throw $ex;
		  }
		 }

		 public function obtenerPagina($page){
		  try {   	
				//Consulta
				$sql = "SELECT * FROM pagina WHERE nom_Pagina='".$page."'";
				//Ejecución de consulta
				$lista = $this -> con -> ejecutararray($sql);
				return  $lista;			  
		  }
		  catch(Exception $ex){
			  throw $ex;
		  }
		 }

		 public function insertarPage($datos){
		  try {	     
		  	$nom_Pagina = ucwords(strtolower($datos['nom_Pagina']));
		  	$cuerpo_Pagina = $datos['cuerpo_Pagina'];
		  	$id_User = $datos['id_User'];
		  	$id_TipoPagina = $datos['id_TipoPagina'];
		  	$link_Pagina = $datos['link_Pagina'];	
			$std = $this -> ConsulExisPage($nom_Pagina);
			// $ejePagina = $this -> con -> ejecutar($sql);	
			// stdSql = estado de ejecucion , stdCtr = Estado Controlador, page , tipo de pagina,
			if ($std) {
				$exis = true;	
				$resultsql = false;
				$resultCtr = false;
				$stdController = false;
				$stdPage = false;
				$stdDatapage = false;
			} else {
				$exis = false;
				 $sql = "INSERT INTO pagina (id_Pagina, nom_Pagina, cuerpo_Pagina, id_User, id_TipoPagina,link_Pagina) VALUES (NULL, '".$nom_Pagina."', '".$cuerpo_Pagina."', '".$id_User."', '".$id_TipoPagina."', '".$link_Pagina."')";
				//Ejecución de consulta
				$resultsql = $ejePagina = $this -> con -> ejecutar($sql);
				//$result = $sql	
				if ($resultsql) {
					$resultsql = "Consulta Ejecutada";
					if ($id_TipoPagina == 1) {

					$crear = new Controller();
					$stdctr = $crear -> crearController($nom_Pagina);
					$stdController= $stdctr['controlador'];
					$stdPage = $stdctr['page'];
					$stdDatapage = $stdctr['datapage'];
						if ($stdctr['estado']) {
							$resultCtr = "creado";
						} else {
							$resultCtr = $stdctr['estado'];
						}
					} else if ($id_TipoPagina == 2){
						$resultCtr = "link";
						$stdController = false;
				$stdPage = false;
				$stdDatapage = false;
					}
				} else {
					$resultsql = "errorInsertar";
				}
			}
			$result = array('stdexis' => $exis, 'stdSql' => $resultsql,'stdCtr' => $resultCtr, 'controlador' => $stdController , 
				'page' => $stdPage, 'datapage' => $stdDatapage);
			return  $result;	  
		  }
		  catch(Exception $ex){
			  throw $ex;
		  }
		 }

		 public function modificarPage($datos){
		  try {	     
		  	$nom_Pagina = ucfirst(strtolower($datos['nom_Pagina']));
		  	$nomeditpage = ucfirst(strtolower($datos['nomeditpage']));
		  	$cuerpo_Pagina = $datos['cuerpo_Pagina'];
		  	$id_User = $datos['id_User'];
		  	$id_TipoPagina = $datos['id_TipoPagina'];
		  	$link_Pagina = $datos['link_Pagina'];			
			$std1 = $this -> ConsulExisPage($nomeditpage);
			$std2 = $this -> ConsulExisPage($nom_Pagina);
			if ($nom_Pagina == $nomeditpage) {
				$std = true;
			} else if ($nom_Pagina != $nomeditpage){
				if ($std1) {
				//Existe la pagina que se esta modificando
					if ($std2) {
						//Si existe la pagina que se desea modificar
						$std = false; 
					} else {
						$std = true; 
					}
				} else {
					$std = false;
				}
			}
			// $ejePagina = $this -> con -> ejecutar($sql);	
			// stdSql = estado de ejecucion , stdCtr = Estado Controlador, page , tipo de pagina,
			
			if (!$std) {
				$exis = false;	
				$form = true;
				$resultsql = false;
				$resultCtr = false;
				$stdController = false;
				$stdPage = false;
				$stdDatapage = false;
				$sql = false;
			} else {
				$exis = true;
				$form = false;
				 $sql = "UPDATE pagina SET nom_Pagina='".$nom_Pagina."' , cuerpo_Pagina = '".$cuerpo_Pagina."' , id_User = '".$id_User."' , id_TipoPagina = '".$id_TipoPagina."' ,link_Pagina = '".$link_Pagina."' WHERE nom_Pagina='".$nomeditpage."'";
				//Ejecución de consulta
				$resultsql = $ejePagina = $this -> con -> ejecutar($sql);
				$ctrNew = new Controller();
				if ($resultsql) {
					$resultsql = "Consulta Ejecutada";
					if ($id_TipoPagina == 1) {			
						$stdctr = $ctrNew -> modificarController($nomeditpage , $nom_Pagina);
						$stdController= $stdctr['controlador'];
						$stdPage = $stdctr['page'];
						$stdDatapage = $stdctr['datapage'];
						if ($stdctr['estado']) {
							$resultCtr = "modificado";
						} else {
							$resultCtr = $stdctr['estado'];
						}
					} else if ($id_TipoPagina == 2){
						$resultCtr = false;
						$stdctr = $ctrNew -> eliminarController($nomeditpage);
						$stdController = false;
				        $stdPage = false;
				        $stdDatapage = false;
					}
				} else {
					$resultsql = "errorModificar";
				}

			}
			$result = array('form'=> $form, 'stdexis' => $sql, 'stdSql' => $resultsql,'stdCtr' => $resultCtr, 'controlador' => $stdController , 
				'page' => $stdPage, 'datapage' => $stdDatapage);
			return  $result;	  
		  }
		  catch(Exception $ex){
			  throw $ex;
		  }
		 }

		 public function eliminarPage($datos){
		 	$dpage = ucfirst(strtolower($datos['nom_Pagina']));
		 	$sql = "DELETE FROM pagina WHERE nom_Pagina='".$dpage."'";
		 	$rows = $this -> con -> ejecutar($sql);
		 	if ($rows) {
		 		$rows = true;
		 	} else {
		 		$rows = false;
		 	}
			$ctrNew = new Controller();
		 	$stdctr = $ctrNew -> eliminarController($dpage);
		 	$data = array('sql' => $sql,'rows' => $rows, 'ctr' => $stdctr['estado']);
		 	return $data;
		 }

		 public function ConsulExisPage($page){
		 	$dpage = ucfirst(strtolower($page));
		 	$sql = "SELECT * FROM pagina WHERE nom_Pagina='".$dpage."'";
		 	$rows = $this -> con -> filasrow($sql);
		 	if ($rows == 0) {
		 		$rows = false;
		 	} else if ($rows > 0) {
		 		$rows = true;
		 	}
		 	return $rows;
		 }

		//Todos los Tipos de Pagina:
		public function TiposPaginas(){
			try {
				$sql = "SELECT * FROM tipo_pagina";
				//Ejecución de consulta
				//$ejePagina = $con -> ejecutar($sql);	
				return  $lista = $this -> con -> ejecutararray($sql);				
			} catch (Exception $e) {
				throw $e;
			}
		}

		//Solo un Tipo de Pagina por ID:
		public function TipoPaginaID($idtipopage){
			try {
				$sql = "SELECT * FROM tipo_pagina WHERE id_TipoPagina='".$idtipopage."'";
				//Ejecución de consulta
				//$ejePagina = $con -> ejecutar($sql);	
				return  $lista = $this -> con -> ejecutararray($sql);				
			} catch (Exception $e) {
				throw $e;
			}
		}

		//Lista de Paginas en Completo Detalle
		public function detallesPage(){
			try {
				$sql = "SELECT pagina.id_Pagina , pagina.nom_Pagina , pagina.cuerpo_Pagina , pagina.link_Pagina , tipo_pagina.id_TipoPagina , tipo_pagina.nom_TipoPagina, usuario.id_User ,usuario.nom_User FROM pagina INNER JOIN tipo_pagina ON pagina.id_TipoPagina=tipo_pagina.id_TipoPagina INNER JOIN usuario ON pagina.id_User=usuario.id_User";
				return  $lista = $this -> con -> ejecutararray($sql);
			} catch (Exception $e) {
				throw $e;
			}
		}

		public function detallestablePage(){
			try {
				$sql = "SHOW TABLE STATUS LIKE 'pagina'";
				return  $lista = $this -> con -> ejecutararray($sql);	
			} catch (Exception $e) {
				throw $e;
			}
		}

		public function detallesPagebyName($namePage){
			try {
				$sql = "SELECT pagina.id_Pagina , pagina.nom_Pagina , pagina.cuerpo_Pagina , pagina.link_Pagina , tipo_pagina.id_TipoPagina , tipo_pagina.nom_TipoPagina, usuario.id_User ,usuario.nom_User FROM pagina INNER JOIN tipo_pagina ON pagina.id_TipoPagina=tipo_pagina.id_TipoPagina INNER JOIN usuario ON pagina.id_User=usuario.id_User WHERE pagina.nom_Pagina='".$namePage."'";
				return  $lista = $this -> con -> ejecutararray($sql);				
			} catch (Exception $e) {
				throw $e;
			}
		}


		public function setAutoincrement($num){
			try {
				$sql = "ALTER TABLE pagina AUTO_INCREMENT =".$num;
				$rows = $this -> con -> ejecutar($sql);
			 	if ($rows) {
			 		$rows = true;
			 	} else {
			 		$rows = false;
			 	}
			 	$data = array('sql' => $rows);
			 	return $data;				
			} catch (Exception $e) {
				throw $e;
			}
		}

		 public function __destruct () {
		 	$this -> con -> cerrar();
		 }
	
	}
 ?>