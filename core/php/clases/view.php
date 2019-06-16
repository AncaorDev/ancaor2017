<?php 
	class View {	
		public function __construct(){
					
		}
		public function renderPage($c ,$p , $listapage = "",$listadetallesdata = "", $listapersonalizada = ""){
			$datos = $listadetallesdata;
			if (file_exists('public/views/'.$c.'/'.$p.'.phtml')) {
				$ruta2 = explode("/", $p);
				if (count($ruta2)>1) {
					$rc = "$c/$ruta2[0]";
				} else {
					$rc = $c;
				}				
				$name = md5(base64_encode($c.'.inc')).".phtml";
				$storage = "storage/views/$rc";
				if (!file_exists($storage)) {
				    mkdir($storage, 0777, true);
				} 
				$file = fopen("storage/views/$c/$p-$name", "w+" );
				$ruta = 'public/views/'.$c.'/'.$p.'.phtml';
				$content = file_get_contents($ruta);
				$buscar = array("{{?" , "{{" , "}}" , "@foreach" , "@endforeach" , ">>>");
				$reemplazar = array("<?php" , "<?=" , "?>" , "<?php foreach" , "<?php } ?> " , "{ ?>");
				$content = str_replace($buscar , $reemplazar, $content);
				fwrite($file, $content);
				fclose($file);
				include ("storage/views/$c/$p-$name");
			} else {
				echo "No se ha encontrado la vista </br>";
				echo 'public/views/'.$c.'/'.$p.'.phtml';
			}
			
		}

		public function renderPageVar($c,$p,$dp,$var){
			$datos = $this -> data;
			$statustable = $this -> tablepage;
			$detallespage = $dp;
			$view = $p;
			$tipospagina = $this -> tp;
			include RUTE.'public/views/'.$c.'/'.$p.'.phtml';
		}

		public function renderdatapage($type,$view,$datospages,$datosproyecto){
			$datospages = $datospages;
			// $datosproyecto = $datosproyecto;
			include RUTE.'public/views/'.$type.'/detalle-'.$view.'.phtml';
			//$controller = get_class($controller);
			
		}
		public function renderById($c,$m1,$dataById,$listapage) {
			$namedet = "detalles".ucfirst(strtolower($m1))."ById";
			$$namedet = $dataById;
			$listadetallesdata = $dataById;
			if (count($dataById)>0) {
				if (file_exists('public/views/'.$c.'/edit/'.strtolower($m1).'-edit.phtml')) {
				include 'public/views/'.$c.'/edit/'.strtolower($m1).'-edit.phtml';
				} else {
					print("No se encontró la Vista");
				}
			} else {
				redirect(HOME.$m1);
			}
		}
	}
 ?>