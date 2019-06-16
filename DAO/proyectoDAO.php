<?php 
class proyectoDAO {
private $con;
private $tabla;

public function __construct() {
	$this -> con = new gestionBD();
	$this -> tabla = "proyecto";
}

public function obtenerProyecto(){
	try {
		$sql = "SELECT * FROM ".$this -> tabla;
		//Ejecución de consulta
		return  $lista = $this -> con -> ejecutararray($sql);		  
	} catch(Exception $ex){
		throw $ex;
	}
} //Fin - Lista del Proyecto 

//Lista del Proyecto en Completo Detalle
public function detallesProyecto(){
	try {
		/* Primera consulta Tablas:
		1 proyecto
		2 tipo_proyecto
		3 estado_proyecto
		4 usuario
		*/
		$sql = "SELECT proyecto.id_Proyecto , proyecto.id_TipoProyecto , proyecto.nom_Proyecto , proyecto.descrip_Proyecto , proyecto.enlace_Proyecto , proyecto.git_Proyecto , proyecto.id_Estado, proyecto.id_User , tipo_proyecto.nom_TipoProyecto , estado_proyecto.nom_EstadoProyecto , usuario.nom_User FROM ".$this -> tabla." INNER JOIN tipo_proyecto ON proyecto.id_TipoProyecto=tipo_proyecto.id_TipoProyecto INNER JOIN estado_proyecto ON proyecto.id_Estado=estado_proyecto.id_Estado INNER JOIN usuario ON proyecto.id_User=usuario.id_User";
		
		// $lista => Aqui se almacena el array con los datos 
		$lista = $this -> con -> ejecutararray($sql);

		// $lista[$i]['id_Proyecto'] recorremos para obtener los id de los proyectos
		$i = 0;
		for ($i=0; $i < count($lista); $i++) { 
		/*Consultamos las tecnologias según su id, utilizamos otra funcion que los devolvera los datos de las 
		tecnologias en $lista2 */
		// $lista2 => tencologias de los proyectos
		$lista2 = $this -> tecnologiasById($lista[$i]['id_Proyecto']); 
		//asignamos al siguiente array la $lista2
		$lista[$i][(count($lista[$i])+1)/2] = $lista2;
		//asignamos al indice tecnologias la $lista2
		$lista[$i]['tecnologias'] = $lista2;
		}	
		// Enviamos todos los datos unidos.
		return $lista;
	} catch (Exception $e) {
			throw $e;
	}
}
// Fin - Lista del Proyecto en Completo Detalle por Id

public function detallesProyectobyId($id){
	try {
		/* Primera consulta Tablas:
		1 proyecto
		2 tipo_proyecto
		3 estado_proyecto
		4 usuario
		*/
		$sql = "SELECT proyecto.id_Proyecto , proyecto.id_TipoProyecto , proyecto.nom_Proyecto , proyecto.descrip_Proyecto , proyecto.enlace_Proyecto , proyecto.git_Proyecto , proyecto.id_Estado, proyecto.id_User , tipo_proyecto.nom_TipoProyecto , estado_proyecto.nom_EstadoProyecto , usuario.nom_User FROM ".$this -> tabla." INNER JOIN tipo_proyecto ON proyecto.id_TipoProyecto=tipo_proyecto.id_TipoProyecto INNER JOIN estado_proyecto ON proyecto.id_Estado=estado_proyecto.id_Estado INNER JOIN usuario ON proyecto.id_User=usuario.id_User WHERE id_Proyecto=".$id;
		
		// $lista => Aqui se almacena el array con los datos 
		$lista = $this -> con -> ejecutararray($sql);

		// $lista[$i]['id_Proyecto'] recorremos para obtener los id de los proyectos
		$i = 0;
		for ($i=0; $i < count($lista); $i++) { 
		/*Consultamos las tecnologias según su id, utilizamos otra funcion que los devolvera los datos de las 
		tecnologias en $lista2 */
		// $lista2 => tencologias de los proyectos
		$lista2 = $this -> tecnologiasById($lista[$i]['id_Proyecto']); 
		//asignamos al siguiente array la $lista2
		$lista[$i][(count($lista[$i])+1)/2] = $lista2;
		//asignamos al indice tecnologias la $lista2
		$lista[$i]['tecnologias'] = $lista2;
		}	
		// Enviamos todos los datos unidos.
		return $lista;
	} catch (Exception $e) {
			throw $e;
	}
}
// Fin - Lista del Proyecto en Completo Detalle POR Id


// Listado de las Tecnologias por el id del Proyecto
public function tecnologiasById($id){
	try {
		/*Tablas : 1.- proyecto_tecnologia , 2.- tecnologia , 3.- proyecto*/
		$sql = "SELECT tecnologia.nom_Tecnologia FROM proyecto_tecnologia INNER JOIN tecnologia ON proyecto_tecnologia.id_Tecnologia=tecnologia.id_Tecnologia INNER JOIN ".$this -> tabla." ON proyecto_tecnologia.id_Proyecto=proyecto.id_Proyecto WHERE proyecto.id_Proyecto=".$id;
		return  $lista = $this -> con -> ejecutararray($sql);
	} catch (Exception $e) {
		throw $e;
	}
}
// Fin - Listado de las Tecnologias por el id del Proyecto

// Listado de los detalles de la tabla proyecto
public function detallestableProyecto(){
	try {
		$sql = "SHOW TABLE STATUS LIKE '".$this -> tabla."'";
		return  $lista = $this -> con -> ejecutararray($sql);	
	} catch (Exception $e) {
		throw $e;
	}
}

public function insertarProyecto($datos){
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
		 	$sql = "DELETE FROM ".$this -> tabla." WHERE nom_Pagina='".$dpage."'";
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
		 	$sql = "SELECT * FROM ".$this -> tabla." WHERE nom_Pagina='".$dpage."'";
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
				$sql = "SHOW TABLE STATUS LIKE '".$this -> tabla."'";
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
				$sql = "ALTER TABLE ".$this -> tabla." AUTO_INCREMENT =".$num;
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

public function consultPost(){
	$this -> postAll();

	return $postAll;
}


public function postAll(){
	extract($_POST, EXTR_PREFIX_SAME, "wddx");
}
public function __destruct () {
	$this -> con -> cerrar();
}

}
 ?>