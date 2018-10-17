<?php

/**
 *
 */

  require_once('libs/Smarty.class.php');

  class GotView{

    private $Smarty;

    function __construct($titulo, $link, $script, $claseLogin, $claseLogout){
      $this->Smarty = new Smarty();
      $this->Smarty->assign('titulo', $titulo);
      $this->Smarty->assign('link', $link);
      $this->Smarty->assign('script', $script);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
    }

    function Home(){
      $this->Smarty->display('templates/home.tpl');
    }

    function Map($script){
      $this->Smarty->assign('script', $script);

      $this->Smarty->display('templates/map.tpl');
    }

    function Casas(){
      $this->Smarty->display('templates/casas.tpl');
    }

  }  //END CLASS

 ?>
