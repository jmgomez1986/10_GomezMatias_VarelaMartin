<?php

require_once('libs/SmartyBC.class.php');

  class LoginView
  {
    private $Smarty;

    function __construct()
    {
      $this->Smarty = new SmartyBC();
    }

    function login($message = ''){
      $this->Smarty->assign('Message',$message);
      $this->Smarty->display('templates/login.tpl');
    }
}
?>