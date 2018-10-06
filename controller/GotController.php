<?php

  require_once "./model/GotModel.php";
  require_once "./view/GotView.php";
  require_once "SecuredController.php";
  require_once "LoginController.php";

  class GotController
  {
    private $model;
    private $view;
    private $link;
    private $claseLogin;
    private $claseLogout;

    function __construct()
    {
      $this->view  = new GotView();
      $this->model = new GotModel();

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

    function Home(){

      $this->model->CreateDB();
      $this->view->Home($this->link, $this->claseLogin, $this->claseLogout);
    }

    function Casas(){
      $this->view->Casas($this->link, $this->claseLogin, $this->claseLogout);
    }

    function Map(){
      $this->view->Map($this->link, $this->claseLogin, $this->claseLogout);
    }
  } //END CLASS

 ?>
