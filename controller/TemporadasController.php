<?php

  require_once "./view/TemporadasView.php";
  require_once "./model/TemporadasModel.php";
  require_once "LoginController.php";

class TemporadasController
{

    private $view;
    private $model;
    private $login;
    private $link;
    private $script;
    private $claseLogin;
    private $claseLogout;
    private $claseReg;
    private $claseAdminUser;
    private $rol;

    public function __construct()
    {

        $this->login  = new LoginController();
        $this->model  = new TemporadasModel();

        $arrayReg = $this->login->isLogueado();
        if (!empty($arrayReg) && $arrayReg['logueado']) {
            $this->claseLogin  = "oculto";
            $this->claseLogout = "visible";
            $this->claseReg    = "oculto";
            $this->link        = "temporadasUser";
            $this->script      = "";
            $this->rol         = $arrayReg['rol'];
            if ($this->rol == 'Limitado') {
                $this->script      = "js/scriptFilter.js";
                $this->claseAdminUser = "oculto";
            } elseif ($arrayReg['rol'] == "Administrador") {
                  $this->claseAdminUser = "visible";
            }
        } else {
            $this->claseLogin     = "visible";
            $this->claseLogout    = "oculto";
            $this->claseReg       = "visible";
            $this->claseAdminUser = "oculto";
            $this->link           = "temporadas";
            $this->script         = "";
            $this->rol            = "";
        }

        $this->view   = new TemporadasView("Game of Thrones", $this->link, $this->script, $this->claseLogin, $this->claseLogout, $this->claseReg, $this->claseAdminUser, false, $this->rol);
    }

    //Devuelve todas las temporadas de la DB y todos los episodios de la DB
    public function temporadas()
    {
        $temporadas = $this->model->getTemporadas();
        $episodios  = $this->model->getAllEpisodios();
        $this->view->mostrarTemporadas($temporadas, $episodios);
    }

    //Devolver los episodios de una temporada dada
    public function episodios($param)
    {
        $arrayImagenes = array();
        if (isset($param) && !empty($param)) {
            $id_temporada = $param[0];
            if (isset($param[2])) {
                $id_episodio  = $param[2];
            } else {
                $id_episodio = null;
            }

            $episodios = $this->model->getEpisodioImagenes($id_temporada, $id_episodio);
            for ($i=0; $i < count($episodios); $i++) {
                $imagenes = $this->model->getImagenes($episodios[$i]['id_season'], $episodios[$i]['id_episode']);
                if (!empty($imagenes)) {
                    for ($j=0; $j <count($imagenes); $j++) {
                        if (file_exists("./".$imagenes[$j]['path_img'])) {
                            array_push($arrayImagenes, $imagenes[$j]['path_img']);
                        }
                    }
                }
                if (!empty($arrayImagenes)) {
                    $episodios[$i]['imagenes'] = $arrayImagenes;
                } else {
                    $episodios[$i]['imagenes'] = [];
                }
                $arrayImagenes = [];
            }

            $this->view->MostrarEpisodios($episodios);
        }
    }//fin Episodios()
} //ENDCLASS
