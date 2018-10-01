<?php

/**
 *
 */

 // require_once('libs/Smarty.class.php');
 require_once('libs/SmartyBC.class.php');

  class TemporadasView
  {
    private $Smarty;

    function __construct()
    {
      // $this->Smarty = new Smarty();
      $this->Smarty = new SmartyBC();
    }

    function MostrarTemporadas($temporadas, $episodios,$link){

      $this->Smarty->assign('temporadas',$temporadas);
      $this->Smarty->assign('episodios',$episodios);
      $this->Smarty->assign('link', $link);
      // $this->Smarty->debugging = true;
      $this->Smarty->display('templates/temporadas.tpl');
    }

    function MostrarEditarTemporada($titulo, $temporada, $link){
      $this->Smarty->assign('titulo',$titulo); // El 'Titulo' del assign puede ser cualquier valor
      $this->Smarty->assign('temporada',$temporada);
      $this->Smarty->assign('link', $link);
      // $this->Smarty->debugging = true;
      $this->Smarty->display('templates/MostrarEditarTemporada.tpl');
    }

    function MostrarEpisodios($episodios,$link){

      $this->Smarty->assign('episodios',$episodios);
      $this->Smarty->assign('link',$link);
      // $this->Smarty->debugging = true;
      $this->Smarty->display('templates/episodiosT.tpl');
    }

    function MostrarEpisodio($episodio,$link){
      $this->Smarty->assign('episodios',$episodio);
      $this->Smarty->assign('link',$link);
      // $this->Smarty->debugging = true;
      $this->Smarty->display('templates/episodiosT.tpl');
    }

    function MostrarEditarEpisodio($titulo, $episodio, $link){
      $this->Smarty->assign('titulo',$titulo); // El 'Titulo' del assign puede ser cualquier valor
      $this->Smarty->assign('episodio',$episodio);
      $this->Smarty->assign('link', $link);
      // $this->Smarty->debugging = true;
      $this->Smarty->display('templates/MostrarEditarEpisodio.tpl');
    }

    function AdminTools($temporadas, $temporadasID, $episodios){

      $this->Smarty->assign('temporadas',$temporadas);
      $this->Smarty->assign('temporadasID',$temporadasID);
      $this->Smarty->assign('episodios',$episodios);
      $this->Smarty->assign('link','temporadasAdmin');
      // $this->Smarty->debugging = true;
      $this->Smarty->display('templates/temporadasAdmin.tpl');
    }
  }

 ?>
