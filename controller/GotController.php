<?php //namespace TpWebII;

  require_once "./model/GotModel.php";
  require_once "./view/GotView.php";
  require_once "LoginController.php";

class GotController
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
        $this->model  = new GotModel();
        $this->model->CreateDB();
        $this->login  = new LoginController();

        $arrayReg = $this->login->isLogueado();

        if ((!empty($arrayReg)) && $arrayReg['logueado']) {
            $this->claseLogin  = "oculto";
            $this->claseLogout = "visible";
            $this->claseReg    = "oculto";
            if ($arrayReg['rol'] == "Administrador") {
                $this->claseAdminUser = "visible";
            } else {
                $this->claseAdminUser = "oculto";
            }
            $this->link        = "temporadasUser";
            $this->script      = "";
        } else {
            $this->claseLogin     = "visible";
            $this->claseLogout    = "oculto";
            $this->claseReg       = "visible";
            $this->claseAdminUser = "oculto";
            $this->link           = "temporadas";
            $this->script         = "";
        }

        $this->view = new GotView("Game of Thrones", $this->link, $this->script, $this->claseLogin, $this->claseLogout, $this->claseReg, $this->claseAdminUser);
    }

    public function home()
    {
        $this->view->home();
    }

    public function casas()
    {
        $this->view->casas();
    }

    public function map()
    {
        $script = "./js/script.js";
        $this->view->map($script);
    }
} //ENDCLASS
