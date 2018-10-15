<?php

	require_once "./view/TemporadasView.php";
	require_once "./model/TemporadasModel.php";
	require_once "SecuredController.php";

	class TemporadasAdminController extends SecuredController{

		private $view;
	  private $model;
		private $error;

		function __construct(){
			try{
				parent::__construct();
			}
			catch (Exception $e){
				//throw new Exception($e);
				$this->error = "error";
			}
			$this->view        = new TemporadasView("Game of Thrones", "temporadasAdmin", "./js/scriptAdmin.js", "oculto", "visible");
			$this->model       = new TemporadasModel();
		}

		function TemporadasAdmin(){

	    $temporadasID = $this->model->getTemporadasID();
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

	    header(TEMPADMIN);
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

      $this->model->setEpisodio($id_temporada, $id_episodio, $titulo, $descripcion);

      header(TEMPADMIN);
    }

     function EliminarEpisodio($param){
      $id_temporada = $param[0];
      $id_episodio  = $param[1];

      $this->model->eliminarEpisodio($id_temporada, $id_episodio);

      header(TEMPADMIN);
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

        if (empty($episodio)){
          $this->model->insertEpisodio($id_temporada, $id_episodio, $titulo, $descripcion);
          header(TEMPADMIN);
        }
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
					 header(TEMPADMIN);
				}
				else {
					$valoresTemporada = [$id_temporada, 	$cant_epis, $comienzo, 	$fin ];
					$this->view->MostrarAgregarTemporada('Agregar temporada', $valoresTemporada);
				}
    }

		function EliminarTemporada($param){

			// if ($this->error !== "error"){
				$id_temporada = $param[0];

				$this->model->eliminarTemporada($id_temporada);
			// }

			header(TEMPADMIN);

    }

	} // ENDCLASS

?>
