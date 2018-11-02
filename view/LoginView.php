<?php

  require_once('libs/Smarty.class.php');

  class LoginView{

    private $Smarty;

    function __construct($titulo, $link, $script, $claseLogin, $claseLogout){
      $this->Smarty = new Smarty();
      $this->Smarty->assign('titulo', $titulo);
      $this->Smarty->assign('link', $link);
      $this->Smarty->assign('script', $script);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
    }

    function login($message = ''){
      $this->Smarty->assign('Message', $message);

      $this->Smarty->display('templates/login.tpl');
    }

  }  //END CLASS

?>
