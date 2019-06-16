<?php 
	class Controller {

		public function crearController($dato){
			$std = false;
			$stdController = "";
			$stdPage = "";
			$stdDatapage = "";
			$nompageCtr = strtolower($dato);
			$nompage = ucfirst($nompageCtr);
			$controller = $nompageCtr.'Controller.php';
			$path1 = 'C:\\xampp\\htdocs\\ancaor2017\controllers\\page\\'.$controller ;
			$path2 = 'C:\\xampp\\htdocs\\ancaor2017\controllers\\index\\'.$controller ;
			if (file_exists($path2)){
				$stdController = false;
			}else {
				$tplCtr = fopen($path1, "w+");
				include 'controller.tpl';
				if (fwrite($tplCtr, $datacontroller)) {
					$stdController = "Controlador Creado";
					$pathview = 'C:\\xampp\\htdocs\\ancaor2017\\views\\page\\'.$nompageCtr.'.phtml';
					$tplpage = fopen($pathview, "w+");
					include 'page.tpl';
					if (fwrite($tplpage,$page)) {
						$stdPage = "Pagina Creada";
						$pathdata = 'C:\\xampp\\htdocs\\ancaor2017\views\\page\\data\\data-'.$nompageCtr.'.phtml';
						$tpldata = fopen($pathdata,"w+");
						include 'datapage.tpl';                 
						if (fwrite($tpldata,$datapage)) {
							$stdDatapage = "Datos Creados";
							$std = true;
						} else {
							$stdDatapage = "Error al crear data";
						}

					} else {
						$stdPage = "Error al crear pagina";
					}
				} else {
					$stdController = "Error al crear controlador";
				}
				fclose($tplCtr);
			}
		$message = array('estado' => $std, 'controlador' => $stdController , 'page' => $stdPage, 'datapage' => $stdDatapage);	
		return $message;
		}

		public function modificarController($dato1, $dato2){
			$std = false;
			$stdController = "";
			$stdPage = "";
			$stdDatapage = "";
			$oldname = strtolower($dato1);
			$newname  = strtolower($dato2);
			$nompage = ucfirst($newname);
			$controllerold = $oldname.'Controller.php';
			$controllernew = $newname.'Controller.php';
			$pathold = 'C:\\xampp\\htdocs\\ancaor2017\controllers\\page\\'.$controllerold ;
			$pathnew = 'C:\\xampp\\htdocs\\ancaor2017\controllers\\page\\'.$controllernew ;
			if (!file_exists($pathold)){
				return  $this ->  crearController($nompage);
			} else {
				$renameCtr = rename($pathold, $pathnew);
				$tplCtr = fopen($pathnew, "w+");
				include 'controller.tpl';
				if (fwrite($tplCtr, $datacontroller)) {
					$stdController = "Controlador Creado";
					$pathviewold = 'C:\\xampp\\htdocs\\ancaor2017\\views\\page\\'.$oldname.'.phtml';
					$pathviewnew = 'C:\\xampp\\htdocs\\ancaor2017\\views\\page\\'.$newname.'.phtml';
					$stdPage = rename($pathviewold,$pathviewnew);
					if ($stdPage) {
						$stdPage = "Pagina Renombrada";
						$pathdataold = 'C:\\xampp\\htdocs\\ancaor2017\views\\page\\data\\data-'.$oldname.'.phtml';
						$pathdatanew = 'C:\\xampp\\htdocs\\ancaor2017\views\\page\\data\\data-'.$newname.'.phtml';
						$tpldata = rename($pathdataold,$pathdatanew);               
						if ($tpldata) {
							$stdDatapage = "Datos Modificados";
							$std = true;
						} else {
							$stdDatapage = "Error al modificar data";
						}

					} else {
						$stdPage = "Error al renombrar pagina";
					}
				} else {
					$stdController = "Error al renombrar controlador";
				}
				fclose($tplCtr);
				$message = array('estado' => $std, 'controlador' => $stdController , 'page' => $stdPage, 'datapage' => $stdDatapage);	
				return $message;
			}
		
		}

		public function eliminarController($dato1){
			$std = false;
			$stdController = "";
			$stdPage = "";
			$stdDatapage = "";
			$nompage = strtolower($dato1);
			$controller = $nompage.'Controller.php';
			$path = 'C:\\xampp\\htdocs\\ancaor2017\controllers\\page\\'.$controller;
			if (!file_exists($path)){
				$stdController = false;
			}else {
				$deleteCtr = unlink($path);
				if ($deleteCtr) {
					$stdController = "Controlador Eliminado";
					$pathview = 'C:\\xampp\\htdocs\\ancaor2017\\views\\page\\'.$nompage.'.phtml';
					$stdPage = unlink($pathview);
					if ($stdPage) {
						$stdPage = "Pagina Eliminada";
						$pathdata = 'C:\\xampp\\htdocs\\ancaor2017\views\\page\\data\\data-'.$nompage.'.phtml';
						$tpldata = unlink($pathdata);               
						if ($tpldata) {
							$stdDatapage = "Datos Eliminada";
							$std = true;
						} else {
							$stdDatapage = "Error al eliminar data";
						}

					} else {
						$stdPage = "Error al eliminar pagina";
					}
				} else {
					$stdController = "Error al eliminar controlador";
				}
			}
		$message = array('estado' => $std, 'controlador' => $stdController , 'page' => $stdPage, 'datapage' => $stdDatapage);	
		return $message;
		}

	}
 ?>