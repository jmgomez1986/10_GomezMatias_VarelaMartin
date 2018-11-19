<?php

require_once('libs/Smarty.class.php');

class TemporadasView
{
    private $Smarty;

    public function __construct($titulo, $link, $script, $claseLogin, $claseLogout, $claseReg, $claseAdminUser, $logueado, $rol)
    {
        $this->Smarty = new Smarty();
        $this->Smarty->assign('titulo', $titulo);
        $this->Smarty->assign('link', $link);
        $this->Smarty->assign('script', $script);
        $this->Smarty->assign('claseLogin', $claseLogin);
        $this->Smarty->assign('claseLogout', $claseLogout);
        $this->Smarty->assign('claseReg', $claseReg);
        $this->Smarty->assign('claseAdminUser', $claseAdminUser);
        $this->Smarty->assign('logueado', $logueado);
        $this->Smarty->assign('rol', $rol);
    }

    public function mostrarTemporadas($temporadas, $episodios)
    {
        $this->Smarty->assign('temporadas', $temporadas);
        $this->Smarty->assign('episodios', $episodios);
        $this->Smarty->display('templates/temporadas.tpl');
    }

    public function mostrarEditarTemporada($titulo, $temporada)
    {
        $this->Smarty->assign('titulo', $titulo);
        $this->Smarty->assign('temporada', $temporada);
        $this->Smarty->display('templates/MostrarEditarTemporada.tpl');
    }

    public function mostrarEpisodios($episodios)
    {
        $this->Smarty->assign('episodios', $episodios);
        $this->Smarty->display('templates/episodiosT.tpl');
    }

    public function mostrarEpisodio($episodio)
    {
        $this->Smarty->assign('episodios', $episodio);
        $this->Smarty->display('templates/episodiosT.tpl');
    }

    public function mostrarEditarEpisodio($titulo, $episodio)
    {
        $this->Smarty->assign('titulo', $titulo);
        $this->Smarty->assign('episodio', $episodio);
        $this->Smarty->display('templates/MostrarEditarEpisodio.tpl');
    }

    public function mostrarAgregarEpisodio($titulo, $id_temporada, $valoresEpisodio)
    {
        $this->Smarty->assign('titulo', $titulo);
        $this->Smarty->assign('id_temporada', $id_temporada);
        if (!empty($valoresEpisodio)) {
            $this->Smarty->assign('existencia', 'existencia');
        } else {
            $valoresEpisodio = ['','','',''];
            $this->Smarty->assign('existencia', '');
        }
        $this->Smarty->assign('valoresEpisodio', $valoresEpisodio);
        $this->Smarty->display('templates/MostrarAgregarEpisodio.tpl');
    }

    public function adminTools($temporadas, $temporadasID, $episodios)
    {
        $this->Smarty->assign('temporadas', $temporadas);
        $this->Smarty->assign('temporadasID', $temporadasID);
        $this->Smarty->assign('episodios', $episodios);
        $this->Smarty->display('templates/temporadas.tpl');
    }

    public function mostrarAgregarTemporada($titulo, $valoresTemporada)
    {
        $this->Smarty->assign('titulo', $titulo);

        if (!empty($valoresTemporada)) {
            $this->Smarty->assign('existencia', 'existencia');
        } else {
            $valoresTemporada = ['','','',''];
            $this->Smarty->assign('existencia', '');
        }
        $this->Smarty->assign('valoresTemporada', $valoresTemporada);
        $this->Smarty->display('templates/MostrarAgregarTemporada.tpl');
    }

    public function mostrarImagenesEpisodio($titulo, $imagenes, $id_temporada, $id_episodio)
    {
        $this->Smarty->assign('titulo', $titulo);
        $this->Smarty->assign('imagenes', $imagenes);
        $this->Smarty->assign('id_season', $id_temporada);
        $this->Smarty->assign('id_episode', $id_episodio);
        $this->Smarty->assign('script', '');
        $this->Smarty->display('templates/MostrarImagenesEpisodio.tpl');
    }
} //ENDCLASS
