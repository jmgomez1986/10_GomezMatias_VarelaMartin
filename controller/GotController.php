<?php

  require_once "./model/GotModel.php";
  require_once "./view/GotView.php";
  require_once "LoginController.php";

  class GotController{
    private $model;
    private $view;
    private $link;
    private $script;
    private $claseLogin;
    private $claseLogout;

    function __construct(){
      $this->model  = new GotModel();

      if (LoginController::isLogueado()){
        $this->claseLogin  = "oculto";
        $this->claseLogout = "visible";
        $this->link        = "temporadasAdmin";
        $this->script      = "";
      }
      else{
        $this->claseLogin  = "visible";
        $this->claseLogout = "oculto";
        $this->link        = "temporadas";
        $this->script      = "";
      }

      $this->view   = new GotView("Game of Thrones", $this->link, $this->script, $this->claseLogin, $this->claseLogout );

    }

    function Home(){
      $this->model->CreateDB();
      $this->view->Home();
    }

    function Casas(){
      $this->view->Casas();
    }

    function Map(){
      $script = "./js/script.js";
      $this->view->Map($script);
    }
    
  } //END CLASS

 ?>
