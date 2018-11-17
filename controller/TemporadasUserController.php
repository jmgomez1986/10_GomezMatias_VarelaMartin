<?php

	require_once "./view/TemporadasView.php";
	require_once "./model/TemporadasModel.php";
	require_once "SecuredController.php";

	class TemporadasUserController extends SecuredController {

		private $rol            = null;
		private $script         = null;
		private $claseAdminUser = null;
		private $view           = null;
	  private $model          = null;

		public function __construct(){

				parent::__construct();

				if isset($_SESSION['rol']){
					$this->rol         = $_SESSION['rol'];
					if ( $this->rol == "Administrador" ){
						$this->script         = "./js/scriptAdmin.js";
						$this->claseAdminUser = "visible";
					}
					elseif ( $this->rol == "Limitado" ){
						$this->script         = "./js/scriptFilter.js";
						$this->claseAdminUser = "oculto";
					}
				}

				$this->view        = new TemporadasView("Game of Thrones", "temporadasUser", $this->script, "oculto", "visible", "oculto", $this->claseAdminUser, true, $this->rol);
				$this->model       = new TemporadasModel();
		}

		public function TemporadasUser(){

	    $temporadasID = $this->model->getTemporadasID(); //Devuelve los Id's de las temporadas para el listado del primer dropdown
	    $temporadas   = $this->model->getTemporadas();
	    $episodios    = $this->model->getAllEpisodios();
	    $this->view->AdminTools($temporadas, $temporadasID, $episodios);

	  }

		public function EditarTemporada($param){

			if(isset($param) && (!empty($param)){
				if ( $this->rol == "Administrador"){
					$id_temporada = $param[0];

					$Temporada = $this->model->GetTemporada($id_temporada);
					$this->view->MostrarEditarTemporada("Editar Temporada", $Temporada[0]);
				}else{
					$this->logout();
					header(LOGIN . "/userFail");
				}
			}
		}

		public function GuardarEditarTemporada(){

			if(isset($_POST["idForm"]) && isset($_POST["cantEpForm"]) && isset($_POST["comienzoForm"]) && isset($_POST["finForm"])){
				$id_emporada        = $_POST["idForm"];
				$cantEpisodios      = $_POST["cantEpForm"];
				$comienzoTemporada  = $_POST["comienzoForm"];
				$finTemporada       = $_POST["finForm"];

				$this->model->setTemporada($id_emporada, $cantEpisodios, $comienzoTemporada, $finTemporada);
			}

			header(TEMPUSER);

		}

		public function EditarEpisodio($param){

			if( isset($param) && (!empty($param))){
				if ( $this->rol == "Administrador"){
					$id_season   = $param[0];
					$id_episode  = $param[1];

					$episodio = $this->model->getEpisodioImagenes($id_season, $id_episode);
					$this->view->MostrarEditarEpisodio('Editar episodio', $episodio[0]);
				}else{
					$this->logout();
					header(LOGIN . "/userFail");
				}
			}
		}

		public function GuardarEditarEpisodio(){

			if(isset($_POST["idTemp"]) && isset($_POST["idEpis"]) && isset($_POST["titulo"]) && isset($_POST["descripcion"])){
				$id_temporada = $_POST["idTemp"];
				$id_episodio  = $_POST["idEpis"];
				$titulo       = $_POST["titulo"];
				$descripcion  = $_POST["descripcion"];

				$rutaTempImagenes = $_FILES['imagenes']['tmp_name'];

				$this->model->setEpisodio($id_temporada, $id_episodio, $titulo, $descripcion, $rutaTempImagenes);
			}

			header(TEMPUSER);

		}

		public function EliminarEpisodio($param){

			if( isset($param) && (!empty($param))){
				$id_temporada = $param[0];
				$id_episodio  = $param[1];

				$this->model->eliminarEpisodio($id_temporada, $id_episodio);
			}
			header(TEMPUSER);

		}

		public function AgregarEpisodio($param){

			if( isset($param) && (!empty($param))){
				$id_temporada    = $param[0];
				$valoresEpisodio = array();
				$this->view->MostrarAgregarEpisodio('Agregar episodio', $id_temporada, $valoresEpisodio);
			}

		}

		public function GuardarAgregarEpisodio(){

			if(isset($_POST["idTemp"]) && isset($_POST["idEp"]) && isset($_POST["tituloE"]) && isset($_POST["descE"])){
				$id_temporada = $_POST["idTemp"];
				$id_episodio  = $_POST["idEp"];
				$titulo       = $_POST["tituloE"];
				$descripcion  = $_POST["descE"];
 				$episodio = $this->model->getEpisodioImagenes($id_temporada, $id_episodio);
 				//Si el resultado esta vacio, es porque el episodio a agregar no existe. asique todo OK
				if (empty($episodio[0])){
					$rutaTempImagenes = $_FILES['imagenes']['tmp_name'];
					$episodio = $this->model->insertEpisodio($id_temporada, $id_episodio, $titulo, $descripcion, $rutaTempImagenes);
					header(TEMPUSER);
				}
				//Si el episodio ya existe, lo mandamos de nuevo a que cambie los valores
				else{
					$valoresEpisodio = [$id_temporada, 	$id_episodio, $titulo, 	$descripcion ];
					$this->view->MostrarAgregarEpisodio('Agregar episodio', $id_temporada, $valoresEpisodio);
				}
			}

		}

		public function agregarTemporada(){

			$valoresTemporada = array();

			$this->view->MostrarAgregarTemporada('Agregar temporada', $valoresTemporada);

		}

		public function GuardarAgregarTemporada(){

			if(isset($_POST["idTemp"]) && isset($_POST["cantEp"]) && isset($_POST["comienzoTemp"]) && isset($_POST["finTemp"])){
				$id_temporada = $_POST["idTemp"];
				$cant_epis    = $_POST["cantEp"];
				$comienzo     = $_POST["comienzoTemp"];
				$fin          = $_POST["finTemp"];

				$temporada = $this->model->getTemporada($id_temporada);
				if (empty($temporada)){
					$this->model->insertTemporada($id_temporada, $cant_epis, $comienzo, $fin);
					header(TEMPUSER);
				}
				else {
					$valoresTemporada = [$id_temporada, 	$cant_epis, $comienzo, 	$fin ];
					$this->view->MostrarAgregarTemporada('Agregar temporada', $valoresTemporada);
				}
			}

		}

		public function EliminarTemporada($param){

			if (isset($param) && (!empty($param))){
				$id_temporada = $param[0];
				$this->model->eliminarTemporada($id_temporada);
			}

			header(TEMPUSER);

		}

		public function MostrarImagenes($params=[]){

			$id_temporada = $params[0];
			$id_episodio  = $params[1];

			$imagenes = $this->model->getImagenes($id_temporada, $id_episodio);
			$this->view->MostrarImagenesEpisodio('Imagenes del episodio', $imagenes, $id_temporada, $id_episodio );

		}

		public function EliminarImagen($params=[]){
			$id_temporada   = $params[0];
			$id_episodio    = $params[1];
			$id_images      = $_POST["ID"];
			$id_imagesDEL   = ['id_image' => [] ];
			foreach ($id_images as $key => $id_image) {
				$this->model->eliminarImagenEpisodio($id_image);
			}

			header(TEMPUSER);
		}

	} // ENDCLASS
