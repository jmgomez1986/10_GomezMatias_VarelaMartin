<?php

/**
 *
 */

 require('libs/Smarty.class.php');

  class TemporadasView
  {

    function __construct()
    {

    }

    function Mostrar($temporadas){

      $smarty = new Smarty();
      $smarty->assign('temporadas',$temporadas);
      //$smarty->debugging = true;
      $smarty->display('templates/temporadas.tpl');

    }

  }

 ?>
