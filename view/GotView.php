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

    function Home($link){
      $this->Smarty->assign('link',$link);
      $this->Smarty->display('templates/home.tpl');
    }

    function Map($link){
      $this->Smarty->assign('link',$link);
      $this->Smarty->display('templates/map.tpl');
    }

    function Casas($link){
      $this->Smarty->assign('link',$link);
      $this->Smarty->display('templates/casas.tpl');
    }

  }

 ?>
