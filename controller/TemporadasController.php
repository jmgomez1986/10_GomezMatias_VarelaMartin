 <?php
  require_once "./view/TemporadasView.php";
  require_once "./model/TemporadasModel.php";
  require_once "LoginController.php";


  class TemporadasController{

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

    function __construct(){

      $this->login  = new LoginController();
      $this->model  = new TemporadasModel();

      $arrayReg = $this->login->isLogueado();
      if (  (!empty($arrayReg)) && $arrayReg['logueado'] ){
        $this->claseLogin  = "oculto";
        $this->claseLogout = "visible";
        $this->claseReg    = "oculto";
        $this->link        = "temporadasUser";
        $this->script      = "";
        $this->rol         = $arrayReg['rol'];
        if ( $this->rol == 'Limitado'){
          $this->script      = "js/scriptFilter.js";
          $this->claseAdminUser = "oculto";
        }elseif ( $arrayReg['rol'] == "Administrador"){
            $this->claseAdminUser = "visible";
          }
      }
      else{
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
    function Temporadas(){
      $temporadas = $this->model->getTemporadas();
      $episodios  = $this->model->getAllEpisodios();
      $this->view->MostrarTemporadas($temporadas, $episodios);
    }

    //Devolver los episodios de una temporada dada
    function Episodios($param){
      if (!empty($param)){
        $id_temporada = $param[0];

  			$episodios = $this->model->getEpisodios($id_temporada);
        $this->view->MostrarEpisodios($episodios);
      }

    }

    //Devuelve un episodio dado de una temporada dada
    function Episodio($param){
      if (!empty($param)){
        $id_temporada = $param[0];
        $id_episodio  = $param[2];

  			$episodio = $this->model->getEpisodio($id_temporada,$id_episodio);
        $this->view->MostrarEpisodio($episodio);
      }

    }

  } //END CLASS

 ?>
