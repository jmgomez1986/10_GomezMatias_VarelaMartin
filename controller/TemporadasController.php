<?php
  require_once "./view/TemporadasView.php";
  require_once "./model/TemporadasModel.php";
  require_once "LoginController.php";


  class TemporadasController
  {
    private $view;
    private $model;
    private $link;
    private $script;
    private $claseLogin;
    private $claseLogout;

    function __construct(){

      $this->view   = new TemporadasView();
      $this->model  = new TemporadasModel();
      $this->script = "";

      if (LoginController::isLogueado()){
        $this->link        = "temporadasAdmin";
        $this->claseLogin  = "oculto";
        $this->claseLogout = "visible";
      }
      else{
        $this->link        = "temporadas";
        $this->claseLogin  = "visible";
        $this->claseLogout = "oculto";
      }
    }

    //Devuelve todas las temporadas de la DB y todos los episodios de la DB
    function Temporadas(){
      $temporadas = $this->model->getTemporadas();
      $episodios  = $this->model->getAllEpisodios();
      $this->view->MostrarTemporadas($temporadas, $episodios, $this->link, $this->script, $this->claseLogin, $this->claseLogout);
    }

    //Devolver los episodios de una temporada dada
    function Episodios($param){
      $id_temporada = $param[0];

			$episodios = $this->model->getEpisodios($id_temporada);
      $this->view->MostrarEpisodios($episodios,$this->link, $this->script, $this->claseLogin, $this->claseLogout);
    }

    //Devuelve un episodio dado de una temporada dada
    function Episodio($param){
      $id_temporada = $param[0];
      $id_episodio  = $param[2];

			$episodio = $this->model->getEpisodio($id_temporada,$id_episodio);
      $this->view->MostrarEpisodio($episodio, $this->link, $this->script, $this->claseLogin, $this->claseLogout);
    }

  } //END CLASS

 ?>
