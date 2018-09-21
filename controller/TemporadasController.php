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

  }

 ?>
