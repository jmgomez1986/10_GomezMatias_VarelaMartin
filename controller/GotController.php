<?php

  require_once "./view/GotView.php";
  // require_once "./model/GotModel.php";
  require_once "SecuredController.php";

  class GotController
  {
    private $view;
    // private $model;

    function __construct()
    {
      // parent::__construct();
      $this->view  = new GotView();
      // $this->model = new GotModel();
    }

    function Home(){
      $this->view->Home();
    }

    function Casas(){
      $this->view->Casas();
    }

    function Map(){
      $this->view->Map();
    }

  }

 ?>
