<?php
require_once "./view/TemporadasView.php";
require_once "./model/TemporadasModel.php";
require_once "SecuredController.php";
require_once "LoginController.php";

class TemporadasAdminController extends SecuredController{
	
	private $view;
    private $model;
    private $link;

	function __construct(){
		parent::__construct();
      	$this->view  = new TemporadasView();
      	$this->model = new TemporadasModel();
      	$this->link = "TemporadasAdmin";
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
        $this->view->MostrarEditarTemporada("Editar Temporada", $Temporada[0], 'temporadasAdmin');
    }

    function GuardarEditarTemporada(){
      $id_emporada        = $_POST["idForm"];
      $cantEpisodios      = $_POST["cantEpForm"];
      $comienzoTemporada  = $_POST["comienzoForm"];
      $finTemporada       = $_POST["finForm"];

      $this->model->setTemporada($id_emporada,$cantEpisodios,$comienzoTemporada,$finTemporada);

      header(TEMPADMIN);
    }

    function EditarEpisodio($param){
      $id_temporada = $param[0];
      $id_episodio  = $param[1];

      $episodio = $this->model->getEpisodio($id_temporada,$id_episodio);
      $this->view->MostrarEditarEpisodio('Editar episodio', $episodio[0], 'temporadasAdmin');
    }

    function GuardarEditarEpisodio(){
      $id_temporada = $_POST["idTemp"];
      $id_episodio  = $_POST["idEpis"];
      $titulo       = $_POST["tituloForm"];
      $descripcion  = $_POST["descripcion"];

      $this->model->setEpisodio($id_temporada,$id_episodio,$titulo,$descripcion);

      header(TEMPADMIN);
    }

     function EliminarEpisodio($param){
      $id_temporada = $param[0];
      $id_episodio  = $param[1];

      $this->model->eliminarEpisodio($id_temporada,$id_episodio);

      header(TEMPADMIN);

    }
}
?>