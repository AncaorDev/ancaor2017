<?php 
	class Index extends pageModel {
		//Contenedor sera la 
		private $vista;
		private $datospages;
		private $numfiles;
		private $model;
		private $view;

		public function __construct() {
			$this -> model = new pageModel();
			$this -> view = new View();
			$this -> vista = strtolower(get_class($this));
			$this -> datospages = $this -> model -> obtenerPages();
			$this -> numfiles = $this -> model -> obtenerFilas();	
		}

		public function MostrarPage($page) {
			try {
				$this -> view -> renderpage($page, $this -> vista, $this -> datospages,$this -> numfiles);	
			} catch (Exception $e) {
				throw $e;
			}
		}
	}

	$mostrar = new Index();
	$mostrar -> MostrarPage('index')
	
?>