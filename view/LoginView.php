<?php

  require_once('libs/Smarty.class.php');

  class LoginView{

    private $Smarty;

    function __construct(){
      $this->Smarty = new Smarty();
    }

    function login($message = ''){
      $this->Smarty->assign('Message', $message);

      $this->Smarty->display('templates/login.tpl');
    }
  }  //END CLASS

?>
