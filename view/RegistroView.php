<?php

  require_once('libs/Smarty.class.php');

  class RegistroView{

    private $Smarty;

    function __construct($titulo, $link, $script, $claseLogin, $claseLogout, $claseReg, $claseAdminUser){
      $this->Smarty = new Smarty();
      $this->Smarty->assign('titulo', $titulo);
      $this->Smarty->assign('link', $link);
      $this->Smarty->assign('script', $script);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
      $this->Smarty->assign('claseReg', $claseReg);
      $this->Smarty->assign('claseAdminUser', $claseAdminUser);
    }

    function Registro($message=''){
      $this->Smarty->assign('Message', $message);
      $this->Smarty->display('templates/registro.tpl');
    }

  }  //END CLASS

?>
