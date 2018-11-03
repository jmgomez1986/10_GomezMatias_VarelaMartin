<?php

  require_once "./view/ComentariosView.php";
  require_once "LoginController.php";

  class ComentariosController{

    private $view;
    private $login;
    private $link;
    private $script;
    private $claseLogin;
    private $claseLogout;
    private $claseReg;

    function __construct(){

      $this->login  = new LoginController();

      if ( !empty($this->login->isLogueado()) ){
        $this->claseLogin  = "oculto";
        $this->claseLogout = "visible";
        $this->claseReg    = "oculto";
        $this->link        = "temporadasUser";
        $this->script      = "";
      }
      else{
        $this->claseLogin  = "visible";
        $this->claseLogout = "oculto";
        $this->claseReg    = "visible";
        $this->link        = "temporadas";
        $this->script      = "";
      }

      $this->view   = new ComentariosView("Game of Thrones", $this->link, $this->script, $this->claseLogin, $this->claseLogout, $this->claseReg );

    }

    function getComentarios($params){
      $id_temporada = $params[1];
      $id_episodio  = $params[3];
      $this->view->getComentarios($id_temporada, $id_episodio);
    }

  } //END CLASS

 ?>
