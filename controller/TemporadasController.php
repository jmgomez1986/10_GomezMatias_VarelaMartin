<?php
  require_once "./view/TemporadasView.php";
  require_once "./model/TemporadasModel.php";
  require_once "LoginController.php";

  class TemporadasController
  {
    private $view;
    private $model;
    private $link;

    function __construct()
    {
      $this->view  = new TemporadasView();
      $this->model = new TemporadasModel();

      if (LoginController::isLogueado()){
        $this->link = "temporadasAdmin";
      }
      else{
        $this->link = "temporadas";
      }
    }

    //Devuelve todas las temporadas de la DB y todos los episodios de la DB
    function Temporadas(){
      $temporadas = $this->model->getTemporadas();
      $episodios  = $this->model->getAllEpisodios();
      $this->view->MostrarTemporadas($temporadas, $episodios, $this->link);
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

  } //END CLASS


 ?>
