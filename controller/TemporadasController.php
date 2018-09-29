<?php

  require_once "./view/TemporadasView.php";
  require_once "./model/TemporadasModel.php";
  require_once "SecuredController.php";
  require_once "LoginController.php";

  class TemporadasController extends SecuredController
  {
    private $view;
    private $model;
    private $link;

    function __construct()
    {
      parent::__construct();
      $this->view  = new TemporadasView();
      $this->model = new TemporadasModel();
      if (LoginController::isLogueado()){
        $this->link="temporadasAdmin";
      }
      else{
        $this->link="temporadas";
      }
    }

    //Devuelve todas las temporadas de la DB y todos los episodios de la DB
    function Temporadas(){
      if (LoginController::isLogueado()){
        $this->TemporadasAdmin();
      }
      else {
        $this->TemporadasNormal();
      }
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

      $this->model->setTemporada($id_emporada,$cantEpisodios,$comienzoTemporada,$finTemporada);

      header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }

    //Devolver los episodios de una temporada dada
    function Episodios($param){
      $id_temporada = $param[0];

			$episodios = $this->model->getEpisodios($id_temporada);
      $this->view->MostrarEpisodios($episodios,$this->link);
    }

    //Devuelve un episodio dado de una temporada dada
    function Episodio($param){
      $id_temporada = $param[0];
      $id_episodio  = $param[2];

			$episodio = $this->model->getEpisodio($id_temporada,$id_episodio);
      $this->view->MostrarEpisodio($episodio,$this->link);
    }

    function EditarEpisodio($param){
      $id_temporada = $param[0];
      $id_episodio  = $param[1];

      $episodio = $this->model->getEpisodio($id_temporada,$id_episodio);
      $this->view->MostrarEditarEpisodio($episodio[0]);
    }

    function GuardarEditarEpisodio(){
      $id_temporada = $_POST["idTemp"];
      $id_episodio  = $_POST["idEpis"];
      $titulo       = $_POST["tituloForm"];
      $descripcion  = $_POST["descripcion"];

      $this->model->setEpisodio($id_temporada,$id_episodio,$titulo,$descripcion);

      header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }

    function EliminarEpisodio($param){
      $id_temporada = $param[0];
      $id_episodio  = $param[1];

      $this->model->eliminarEpisodio($id_temporada,$id_episodio);

      header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/temporadasAdmin');

    }

/***********************************/
/*********** AdminTools ***********/
/***********************************/
    function TemporadasNormal(){
      $temporadas = $this->model->getTemporadas();
      $episodios  = $this->model->getAllEpisodios();
      $this->view->MostrarTemporadas($temporadas, $episodios);
    }

    function TemporadasAdmin(){

      $temporadasID = $this->model->getTemporadasID();
      $temporadas   = $this->model->getTemporadas();
      $episodios    = $this->model->getAllEpisodios();
      $this->view->AdminTools($temporadas, $temporadasID, $episodios);
    }

  }

 ?>
