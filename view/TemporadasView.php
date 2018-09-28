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
      //$this->Smarty = new Smarty();
      $this->Smarty = new SmartyBC();
    }

    function MostrarTemporadas($temporadas, $episodios){

      $this->Smarty->assign('temporadas',$temporadas);
      $this->Smarty->assign('episodios',$episodios);
      //$this->smarty->debugging = true;
      $this->Smarty->display('templates/temporadas.tpl');
    }

    function MostrarEditarTemporada($titulo, $temporada){
      $this->Smarty->assign('titulo',$titulo); // El 'Titulo' del assign puede ser cualquier valor
      $this->Smarty->assign('temporada',$temporada);
      //$smarty->debugging = true;
      $this->Smarty->display('templates/MostrarEditarTemporada.tpl');
    }

    function MostrarEpisodios($episodios){

      $this->Smarty->assign('episodios',$episodios);
      // $this->smarty->debugging = true;
      $this->Smarty->display('templates/episodiosT.tpl');
    }

    function MostrarEpisodio($episodio){
      $this->Smarty->assign('episodios',$episodio);
      // $this->smarty->debugging = true;
      $this->Smarty->display('templates/episodiosT.tpl');
    }

    function MostrarEditarEpisodio($episodio){

      $this->Smarty->assign('episodio',$episodio);
      //$this->smarty->debugging = true;
      $this->Smarty->display('templates/MostrarEditarepisodio.tpl');
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

    function Login(){
      $this->Smarty->display('templates/login.tpl');
    }

    function AdminTools($temporadas, $temporadasID, $episodios){

      $this->Smarty->assign('temporadas',$temporadas);
      $this->Smarty->assign('temporadasID',$temporadasID);
      $this->Smarty->assign('episodios',$episodios);
      //$this->smarty->debugging = true;

      $this->Smarty->display('templates/temporadasAdmin.tpl');
    }
  }

 ?>
