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

      $lista = "Las temporadas son:<ul>";
			$temporadas = $this->model->getTemporadas();
			foreach($temporadas as $temporada){
				$lista .= "<li>" . "Temporada N° "  . $temporada["id_season"] .
								" - Cant. Episodios: " . $temporada["cant_episodes"] .
						 "</li>";
			}
			$lista .= "</ul>";
      return $lista;
    }

  }


 ?>
