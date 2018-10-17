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

      $this->view   = new GotView("Game of Thrones", "temporadas", "", "visible", "oculto" );
      $this->model  = new GotModel();

      if (LoginController::isLogueado()){
        LoginController::logout();
      }

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
