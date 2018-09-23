<?php

  /**
   *
   */

   require_once "./view/TemporadasView.php";
   require_once "./model/TemporadasModel.php";

  class TemporadasController
  {
    private $view;
    private $model;

    function __construct()
    {
      $this->view  = new TemporadasView();
      $this->model = new TemporadasModel();
    }

    function Temporadas(){
			$temporadas = $this->model->getTemporadas();
      $this->view->MostrarTemporadas($temporadas);
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

    function Episodios($param){
      $id_temporada = $param[0];

			$episodios = $this->model->getEpisodios($id_temporada);
      //var_dump($episodios);
      $this->view->MostrarEpisodios($episodios);
    }

    function EditarEpisodio($param){
      $id_temporada = $param[0];
      $id_episodio = $param[1];
      $episodio = $this->model->getEpisodio($id_temporada,$id_episodio);
      $this->view->MostrarEditarEpisodio($episodio[0]);
    }

    function Home(){
      $this->view->Home();
    }

    function Map(){
      $this->view->Map();
    }

    function Casas(){
      $this->view->Casas(); 
    }

    function GuardarEditarEpisodio(){
      $id_temporada = $_POST["idTemp"];
      $id_episodio  = $_POST["idEpis"];
      $titulo       = $_POST["tituloForm"];
      $descripcion  = $_POST["descripcion"];

      

      $this->model->setEpisodio($id_temporada,$id_episodio,$titulo,$descripcion);

      header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }

  }

 ?>
