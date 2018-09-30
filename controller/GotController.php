<?php

  require_once "./view/GotView.php";
  // require_once "./model/GotModel.php";
  require_once "SecuredController.php";
  require_once "LoginController.php";

  class GotController extends SecuredController
  {
    private $view;
    private $link;
    // private $model;

    function __construct()
    {
      parent::__construct();
      $this->view = new GotView();
      if (LoginController::isLogueado()){
        $this->link="temporadasAdmin";
      }
      else{
        $this->link="temporadas";
      }
      // $this->model = new GotModel();

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
  }

 ?>
