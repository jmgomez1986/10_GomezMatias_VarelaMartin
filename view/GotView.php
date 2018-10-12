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

    function Home($link, $script, $claseLogin, $claseLogout){
      $this->Smarty->assign('link',$link);
      $this->Smarty->assign('script', $script);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
      $this->Smarty->display('templates/home.tpl');
    }

    function Map($link, $script, $claseLogin, $claseLogout){
      $this->Smarty->assign('link',$link);
      $this->Smarty->assign('script', $script);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
      $this->Smarty->display('templates/map.tpl');
    }

    function Casas($link, $script, $claseLogin, $claseLogout){
      $this->Smarty->assign('link',$link);
      $this->Smarty->assign('script', $script);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
      $this->Smarty->display('templates/casas.tpl');
    }

  }  //END CLASS

 ?>
