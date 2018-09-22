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
      $this->view->Mostrar($temporadas);
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

  }

 ?>
