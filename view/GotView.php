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

    function Home(){
      $this->Smarty->display('templates/home.tpl');
    }

    function Map(){
      $this->Smarty->display('templates/map.tpl');
    }

    function Casas(){
      $this->Smarty->display('templates/casas.tpl');
    }

  }

 ?>
