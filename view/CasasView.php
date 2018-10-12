<?php

/**
 *
 */

  require_once('libs/Smarty.class.php');

  class CasasView{

    private $Smarty;

    function __construct($link, $script, $claseLogin, $claseLogout){
      $this->Smarty = new Smarty();
      $this->Smarty->assign('link', $link);
      $this->Smarty->assign('script', $script);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
    }

    function Casas($casa, $columnasMiembrosCasas, $cantCol){
      $this->Smarty->assign('casa' ,$casa);
      $this->Smarty->assign('miembros', $columnasMiembrosCasas);
      $this->Smarty->assign('cantCol', $cantCol);

      $this->Smarty->display('casa.tpl');
    }

  }  //END CLASS

 ?>
