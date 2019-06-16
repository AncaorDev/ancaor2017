<?php 
	class View {
		//$controller = get_class($controller);
		private $user;
		private $model;
		private $tipospagina;
		private $data;
		public function __construct(){
			$this -> model = new  pageModel();
			$this -> dataM = new  dataModel();
			$this -> tp = $this -> model -> TiposPaginas();
			$this -> tablepage = $this -> model -> detallestablePage();
			$this -> data = $this -> dataM -> obtenerData();
			
		}
		// $c => Carpeta
		// $p => Page
		// $dp => Datos de la Página
		public function renderPage($c,$p,$dp){
			$datos = $this -> data;
			$statustable = $this -> tablepage;
			$detallespage = $dp;
			$view = $p;
			$tipospagina = $this -> tp;
			include RUTE.'views/'.$c.'/'.$p.'.phtml';
		}

		public function renderPageVar($c,$p,$dp,$var){
			
			$datos = $this -> data;
			$statustable = $this -> tablepage;
			$detallespage = $dp;
			$view = $p;
			$tipospagina = $this -> tp;
			include RUTE.'views/'.$c.'/'.$p.'.phtml';
		}

		public function renderdatapage($type,$view,$datospages,$datosproyecto){
			$datospages = $datospages;
			$datosproyecto = $datosproyecto;
			include RUTE.'views/'.$type.'/detalle-'.$view.'.phtml';
			//$controller = get_class($controller);
			
		}
		public function renderDetPage($dp,$dpn) {
			$detallespage = $dp;
			$detallespagebyname = $dpn;		
			$tipospagina = $this -> tp;	
			$datos = $this -> data;
			include RUTE.'views/panel/pages-edit.phtml';
		}
	}
 ?>