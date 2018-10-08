<?php

  require_once "./model/CasasModel.php";
  require_once "./view/CasasView.php";
  require_once "SecuredController.php";
  require_once "LoginController.php";

  class CasasController
  {
    private $model;
    private $view;
    private $link;
    private $claseLogin;
    private $claseLogout;

    function __construct()
    {
      $this->model = new CasasModel();
      $this->view  = new CasasView();

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

    function Casas($param){
      $casaNombre  = $param[0];

      $casa = $this->model->getCasa($casaNombre);
      $cantMiembros = count($casa['miembros']);
      $columnasMiembrosCasas = array_chunk($casa['miembros'],8,true);
      $cantCol      = count($columnasMiembrosCasas);
      //var_dump($columnasMiembrosCasas);
      //echo "<h1 style=\"color:red;\">".$cantCol."</h1>";
      $this->view->Casas($casa, $columnasMiembrosCasas, $cantCol, $this->link, $this->claseLogin, $this->claseLogout);

    }

  } //END CLASS

 ?>
