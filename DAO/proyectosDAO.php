<?php 
	class proyectosDAO {
		private $con;
		public function __construct() {
			$this -> con = new gestionBD();
		}
		public function obtenerProyectos(){
		  try {
		     	//Instanciamos la BD
				
				//Consulta
				$sql = "SELECT * FROM proyecto";
				//Ejecución de consulta
				//$ejePagina = $con -> ejecutar($sql);	
				return  $lista = $this -> con -> ejecutararray($sql);		  
		  }
		  catch(Exception $ex){
			  throw $ex;
		  }
		 }
		 //Fin - Lista del Proyecto 

		 //Lista del Proyecto en Completo Detalle
		public function detallesProyecto(){
			try {
				/* Primera consulta Tablas:
				1 proyecto
				2 tipo_proyecto
				3 estado_proyecto
				4 usuario
				*/
				$sql = "SELECT proyecto.id_Proyecto , proyecto.id_TipoProyecto , proyecto.nom_Proyecto , proyecto.descrip_Proyecto , proyecto.enlace_Proyecto , proyecto.git_Proyecto , proyecto.id_Estado, proyecto.id_User , tipo_proyecto.nom_TipoProyecto , estado_proyecto.nom_EstadoProyecto , usuario.nom_User FROM proyecto INNER JOIN tipo_proyecto ON proyecto.id_TipoProyecto=tipo_proyecto.id_TipoProyecto INNER JOIN estado_proyecto ON proyecto.id_Estado=estado_proyecto.id_Estado INNER JOIN usuario ON proyecto.id_User=usuario.id_User";
				
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
		 // Fin - Lista del Proyecto en Completo Detalle

		// Listado de las Tecnologias por el id del Proyecto
		public function tecnologiasById($id){
			try {
				/*Tablas : 1.- proyecto_tecnologia , 2.- tecnologia , 3.- proyecto*/
				$sql = "SELECT tecnologia.nom_Tecnologia FROM proyecto_tecnologia INNER JOIN tecnologia ON proyecto_tecnologia.id_Tecnologia=tecnologia.id_Tecnologia INNER JOIN proyecto ON proyecto_tecnologia.id_Proyecto=proyecto.id_Proyecto WHERE proyecto.id_Proyecto=".$id;
				return  $lista = $this -> con -> ejecutararray($sql);
			} catch (Exception $e) {
				throw $e;
			}
		}
		// Fin - Listado de las Tecnologias por el id del Proyecto

		// Listado de los detalles de la tabla proyecto
		public function detallestableProyecto(){
			try {
				$sql = "SHOW TABLE STATUS LIKE 'proyecto'";
				return  $lista = $this -> con -> ejecutararray($sql);	
			} catch (Exception $e) {
				throw $e;
			}
		}


		 public function __destruct () {
		 	$this -> con -> cerrar();
		 }
	
	}
 ?>