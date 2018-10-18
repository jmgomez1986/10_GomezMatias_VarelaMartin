<?php

  require_once "./model/CasasModel.php";
  require_once "./view/CasasView.php";
  require_once "LoginController.php";

  class CasasController
  {
    private $model;
    private $view;
    private $link;
    private $script;
    private $claseLogin;
    private $claseLogout;

    function __construct(){

      $this->model  = new CasasModel();

      if (LoginController::isLogueado()){
        $this->claseLogin= "oculto";
        $this->claseLogout= "visible";
        $this->link= "temporadasAdmin";
        $this->script="";

      }
      else{
        $this->claseLogin= "visible";
        $this->claseLogout= "oculto";
        $this->link= "temporadas";
        $this->script="";
      }
      $this->view   = new CasasView("Game of Thrones", $this->link, $this->script, $this->claseLogin, $this->claseLogout);

    }

    function Casas($param){
      $casaNombre  = $param[0];

      $casa = $this->model->getCasa($casaNombre);
      $columnasMiembrosCasas = array_chunk($casa['miembros'],8,true);
      $cantCol               = count($columnasMiembrosCasas);
      $this->view->Casas($casa, $columnasMiembrosCasas, $cantCol);

    }

  } //END CLASS

 ?>
