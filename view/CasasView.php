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

    function Casas($casa, $columnasMiembrosCasas, $cantCol, $link, $script, $claseLogin, $claseLogout){
      $this->Smarty->assign('casa',$casa);
      $this->Smarty->assign('miembros',$columnasMiembrosCasas);
      $this->Smarty->assign('cantCol',$cantCol);
      $this->Smarty->assign('link',$link);
      $this->Smarty->assign('script', $script);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
      $this->Smarty->display('casa.tpl');
    }

  }  //END CLASS

 ?>
