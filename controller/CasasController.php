<?php

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
      $casas = ['casa_arryn', 'casa_baratheon', 'casa_greyjoy', 'casa_lannister',
                'casa_stark', 'casa_targaryen'];
      $casa  = $param[0];
      $casaNombre = array_search($casa, $casas);
      //echo "<h1>".$casas[$casaNombre]."</h1>";
      $this->view->Casas($casas[$casaNombre], $this->link, $this->claseLogin, $this->claseLogout);

    }

  } //END CLASS

 ?>
