<?php

/**
 *
 */

  require_once('libs/SmartyBC.class.php');

  class CasasView
  {
    private $Smarty;

    function __construct()
    {
      $this->Smarty = new SmartyBC();
    }

    function Casas($casaNombre, $link, $claseLogin, $claseLogout){
      $templateNombre = 'templates/casas/'.$casaNombre.'.tpl';
      $this->Smarty->assign('link',$link);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
      $this->Smarty->display($templateNombre);
    }

  }  //END CLASS

 ?>
