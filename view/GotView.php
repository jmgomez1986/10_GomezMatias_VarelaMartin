<?php //namespace TpWebII;

  require_once('libs/Smarty.class.php');

class GotView
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

    public function home()
    {
        $this->Smarty->display('templates/home.tpl');
    }

    public function map($script)
    {
        $this->Smarty->assign('script', $script);
        $this->Smarty->display('templates/map.tpl');
    }

    public function casas()
    {
        $this->Smarty->display('templates/casas.tpl');
    }
} //ENDCLASS
