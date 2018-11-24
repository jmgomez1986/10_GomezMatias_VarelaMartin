<?php

  require_once "./model/CasasModel.php";
  require_once "./view/CasasView.php";
  require_once "LoginController.php";

class CasasController
{
    private $model;
    private $view;
    private $login;
    private $link;
    private $script;
    private $claseLogin;
    private $claseLogout;
    private $claseReg;
    private $claseAdminUser;

    public function __construct()
    {
        $this->login  = new LoginController();
        $this->model  = new CasasModel();
        $arrayReg = $this->login->isLogueado();
        if (!empty($arrayReg) && $arrayReg['logueado']) {
            $this->claseLogin     = "oculto";
            $this->claseLogout    = "visible";
            $this->claseReg       = "oculto";
            if ($arrayReg['rol'] == "Administrador") {
                $this->claseAdminUser = "visible";
            } else {
                $this->claseAdminUser = "oculto";
            }
            $this->link           = "temporadasUser";
            $this->script         = "";
        } else {
            $this->claseLogin     = "visible";
            $this->claseLogout    = "oculto";
            $this->claseReg       = "visible";
            $this->claseAdminUser = "oculto";
            $this->link           = "temporadas";
            $this->script         = "";
        }
        $this->view   = new CasasView("Game of Thrones", $this->link, $this->script, $this->claseLogin, $this->claseLogout, $this->claseReg, $this->claseAdminUser);
    }

    public function casas($param)
    {
        if (isset($param) && !empty($param)) {
            $casaNombre  = $param[0];
            $casa = $this->model->getCasa($casaNombre);
            $columnasMiembrosCasas = array_chunk($casa['miembros'], 8, true);
            $cantCol               = count($columnasMiembrosCasas);
            $this->view->casas($casa, $columnasMiembrosCasas, $cantCol);
        }
    }
} //ENDCLASS
