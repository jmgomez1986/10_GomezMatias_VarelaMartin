<?php

  require_once "./model/GotModel.php";
  require_once "./view/GotView.php";
  require_once "SecuredController.php";
  require_once "LoginController.php";

  class GotController
  {
    private $view;
    private $link;
    private $model;

    function __construct()
    {
      $this->view  = new GotView();
      $this->model = new GotModel();

      if (LoginController::isLogueado()){
        $this->link = "temporadasAdmin";
      }
      else{
        $this->link = "temporadas";
      }
    }

    function Home(){

      $this->model->CreateDB();
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
