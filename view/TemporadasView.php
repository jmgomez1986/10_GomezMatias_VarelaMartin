<?php

/**
 *
 */

  require_once('libs/Smarty.class.php');
  //require_once('libs/SmartyBC.class.php');

  class TemporadasView
  {
    private $Smarty;

    function __construct($link,$script,$claseLogin,$claseLogout)
    {
      $this->Smarty = new Smarty();
      //$this->Smarty = new SmartyBC();
      $this->Smarty->assign('link', $link);
      $this->Smarty->assign('script', $script);
      $this->Smarty->assign('claseLogin', $claseLogin);
      $this->Smarty->assign('claseLogout', $claseLogout);
      }

    function MostrarTemporadas($temporadas, $episodios){
      $this->Smarty->assign('temporadas',$temporadas);
      $this->Smarty->assign('episodios',$episodios);

      // $this->Smarty->debugging = true;
      $this->Smarty->display('templates/temporadas.tpl');
    }

    function MostrarEditarTemporada($titulo, $temporada){
      $this->Smarty->assign('titulo',$titulo); // El 'Titulo' del assign puede ser cualquier valor
      $this->Smarty->assign('temporada',$temporada
      $this->Smarty->display('templates/MostrarEditarTemporada.tpl');
    }

    function MostrarEpisodios($episodios){
      $this->Smarty->assign('episodios',$episodios);
      $this->Smarty->display('templates/episodiosT.tpl');
    }

    function MostrarEpisodio($episodio){
      $this->Smarty->assign('episodios',$episodio);
      $this->Smarty->display('templates/episodiosT.tpl');
    }

    function MostrarEditarEpisodio($titulo, $episodio){
      $this->Smarty->assign('titulo',$titulo);
      $this->Smarty->assign('episodio',$episodio);
      $this->Smarty->display('templates/MostrarEditarEpisodio.tpl');
    }

    function MostrarAgregarEpisodio($titulo, $id_temporada, $valoresEpisodio){
      $this->Smarty->assign('titulo',$titulo);
      $this->Smarty->assign('id_temporada', $id_temporada);
      if ( !empty($valoresEpisodio) ){
        $this->Smarty->assign('existencia', 'existencia');
      }
      else{
        $valoresEpisodio = ['','','',''];
        $this->Smarty->assign('existencia', '');
      }
      $this->Smarty->assign('valoresEpisodio',$valoresEpisodio);
      $this->Smarty->display('templates/MostrarAgregarEpisodio.tpl');
    }

    function AdminTools($temporadas, $temporadasID, $episodios){
      $this->Smarty->assign('temporadas',$temporadas);
      $this->Smarty->assign('temporadasID',$temporadasID);
      $this->Smarty->assign('episodios',$episodios);
      $this->Smarty->display('templates/temporadasAdmin.tpl');
    }

    function MostrarAgregarTemporada($titulo, $valoresTemporada){
      $this->Smarty->assign('titulo',$titulo);
      if ( !empty($valoresTemporada) ){
        $this->Smarty->assign('existencia', 'existencia');
      }
      else{
        $valoresTemporada = ['','','',''];
        $this->Smarty->assign('existencia', '');
      }
      $this->Smarty->assign('valoresTemporada',$valoresTemporada);
      $this->Smarty->display('templates/MostrarAgregarTemporada.tpl');
    }

  } //END CLASS

 ?>
