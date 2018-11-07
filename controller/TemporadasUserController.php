<?php

	require_once "./view/TemporadasView.php";
	require_once "./model/TemporadasModel.php";
	require_once "SecuredController.php";

	class TemporadasUserController extends SecuredController {

		private $login;
		private $rol;
		private $script;
		private $view;
	  private $model;

		function __construct(){
				parent::__construct();

				$this->rol         = $_SESSION['rol'];
				if ( $this->rol == "Administrador" ){
					$this->script = "./js/scriptAdmin.js";
				}
				elseif ( $this->rol == "Limitado" ){
					$this->script = "./js/scriptFilter.js";
				}

				$this->view        = new TemporadasView("Game of Thrones", "temporadasUser", $this->script, "oculto", "visible", "oculto", true, $this->rol);
				$this->model       = new TemporadasModel();
		}

		function TemporadasUser(){

	    $temporadasID = $this->model->getTemporadasID(); //Devuelve los Id's de las temporadas para el listado del primer dropdown
	    $temporadas   = $this->model->getTemporadas();
	    $episodios    = $this->model->getAllEpisodios();
	    $this->view->AdminTools($temporadas, $temporadasID, $episodios);

	  }

	  function EditarTemporada($param){

	      $id_temporada = $param[0];

	      $Temporada = $this->model->GetTemporada($id_temporada);
	      $this->view->MostrarEditarTemporada("Editar Temporada", $Temporada[0]);

	  }

	  function GuardarEditarTemporada(){

	    $id_emporada        = $_POST["idForm"];
	    $cantEpisodios      = $_POST["cantEpForm"];
	    $comienzoTemporada  = $_POST["comienzoForm"];
	    $finTemporada       = $_POST["finForm"];

	    $this->model->setTemporada($id_emporada, $cantEpisodios, $comienzoTemporada, $finTemporada);

	    header(TEMPUSER);

	  }

	  function EditarEpisodio($param){

	      $id_temporada = $param[0];
	      $id_episodio  = $param[1];

	      $episodio = $this->model->getEpisodio($id_temporada, $id_episodio);
	      $this->view->MostrarEditarEpisodio('Editar episodio', $episodio[0]);

	    }

    function GuardarEditarEpisodio(){

      $id_temporada = $_POST["idTemp"];
      $id_episodio  = $_POST["idEpis"];
      $titulo       = $_POST["tituloForm"];
      $descripcion  = $_POST["descripcion"];

			$rutaTempImagenes = $_FILES['imagenes']['tmp_name'];

      $this->model->setEpisodio($id_temporada, $id_episodio, $titulo, $descripcion, $rutaTempImagenes);

      header(TEMPUSER);

    }

    function EliminarEpisodio($param){

      $id_temporada = $param[0];
      $id_episodio  = $param[1];

      $this->model->eliminarEpisodio($id_temporada, $id_episodio);

      header(TEMPUSER);

    }

		function AgregarEpisodio($param){

			$id_temporada    = $param[0];
			$valoresEpisodio = array();
			$this->view->MostrarAgregarEpisodio('Agregar episodio', $id_temporada, $valoresEpisodio);

		}

		function GuardarAgregarEpisodio(){

			$id_temporada = $_POST["idTemp"];
			$id_episodio  = $_POST["idEp"];
			$titulo       = $_POST["tituloE"];
			$descripcion  = $_POST["descE"];

			$episodio = $this->model->getEpisodio($id_temporada,$id_episodio);

			//Si el resultado esta vacio, es porque el episodio a agregar no existe. asique todo OK
			if (empty($episodio)){
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

		function agregarTemporada(){

			$valoresTemporada = array();

			$this->view->MostrarAgregarTemporada('Agregar temporada', $valoresTemporada);

		}

		function GuardarAgregarTemporada(){

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

		function EliminarTemporada($param){

			$id_temporada = $param[0];

			$this->model->eliminarTemporada($id_temporada);

			header(TEMPUSER);

		}

	} // ENDCLASS

?>