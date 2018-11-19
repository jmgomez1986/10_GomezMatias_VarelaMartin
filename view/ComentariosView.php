<?php

  require_once('libs/Smarty.class.php');

class ComentariosView
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

    public function getComentarios($id_temporada = '', $id_episodio = '')
    {
        $this->Smarty->assign('id_temporada', $id_temporada);
        $this->Smarty->assign('id_episodio', $id_episodio);
        $this->Smarty->display('templates/comentarios.tpl');
    }

    public function addComment($id_temporada, $id_episodio, $id_user, $script)
    {
        $this->Smarty->assign('id_temporada', $id_temporada);
        $this->Smarty->assign('id_episodio', $id_episodio);
        $this->Smarty->assign('id_user', $id_user);
        $this->Smarty->assign('script', $script);
        $this->Smarty->display('templates/AgregarComentario.tpl');
    }
}  //END CLASS
