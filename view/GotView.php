<?php

/**
 *
 */

  require_once('libs/SmartyBC.class.php');

  class GotView
  {
    private $Smarty;

    function __construct()
    {
      $this->Smarty = new SmartyBC();
    }

    function Home($link, $claseLogin, $claseLogout){
      $this->Smarty->assign('link',$link);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
      $this->Smarty->display('templates/home.tpl');
    }

    function Map($link, $claseLogin, $claseLogout){
      $this->Smarty->assign('link',$link);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
      $this->Smarty->display('templates/map.tpl');
    }

    function Casas($link, $claseLogin, $claseLogout){
      $this->Smarty->assign('link',$link);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);      
      $this->Smarty->display('templates/casas.tpl');
    }

  }  //END CLASS

 ?>
