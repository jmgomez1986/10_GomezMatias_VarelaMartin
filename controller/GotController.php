<?php

  require_once "./view/GotView.php";
  require_once "SecuredController.php";
  require_once "LoginController.php";

  class GotController 
  {
    private $view;
    private $link;

    function __construct()
    {
      $this->view = new GotView();
      if (LoginController::isLogueado()){
        $this->link="temporadasAdmin";
      }
      else{
        $this->link="temporadas";
      }
    }

    function Home(){

      $this->view->Home($this->link);
    }

    function Casas(){
      $this->view->Casas($this->link);
    }

    function Map(){
      $this->view->Map($this->link);
    }
  } //END CLASS

 ?>
