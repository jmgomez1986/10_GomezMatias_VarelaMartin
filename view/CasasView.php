<?php

  require_once('libs/Smarty.class.php');

class CasasView
{
    private $Smarty;

    public function __construct($titulo, $link, $script, $claseLogin, $claseLogout, $claseReg, $claseAdminUser)
    {
        $this->Smarty = new Smarty();
        $this->Smarty->assign('titulo', $titulo);
        $this->Smarty->assign('link', $link);
        $this->Smarty->assign('script', $script);
        $this->Smarty->assign('claseLogin', $claseLogin);
        $this->Smarty->assign('claseLogout', $claseLogout);
        $this->Smarty->assign('claseReg', $claseReg);
        $this->Smarty->assign('claseAdminUser', $claseAdminUser);
    }

    public function casas($casa, $columnasMiembrosCasas, $cantCol)
    {
        $this->Smarty->assign('casa', $casa);
        $this->Smarty->assign('miembros', $columnasMiembrosCasas);
        $this->Smarty->assign('cantCol', $cantCol);
        $this->Smarty->display('casa.tpl');
    }
}  //END CLASS
