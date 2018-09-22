<?php

/**
 *
 */

 require('libs/Smarty.class.php');

  class TemporadasView
  {
    private $Smarty;

    function __construct()
    {
      $this->Smarty = new Smarty();
    }

    function Mostrar($temporadas){

      $this->Smarty->assign('temporadas',$temporadas);
      //$this->smarty->debugging = true;
      $this->Smarty->display('templates/temporadas.tpl');
    }

    function MostrarEditarTemporada($titulo, $temporada){
      $this->Smarty->assign('titulo',$titulo); // El 'Titulo' del assign puede ser cualquier valor
      $this->Smarty->assign('temporada',$temporada);
      $this->Smarty->assign('home',"http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
      //$smarty->debugging = true;
      $this->Smarty->display('templates/MostrarEditarTemporada.tpl');
    }

  }

 ?>
