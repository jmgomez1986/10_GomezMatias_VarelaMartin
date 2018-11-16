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

    private function formatearEpisodio($episodio){

      $episodioFormateado = array();
      $arrayTMP           = array();

      // var_dump($episodio);
      // die();

      $id_temporada = $episodio[0]['id_season'];
      $id_episodio  = $episodio[0]['id_episode'];

      for ($i=0; $i < count($episodio); $i++) {
        if ( $id_temporada == $episodio[$i]['id_season'] && $id_episodio  == $episodio[$i]['id_episode'] ){
          $episodioFormateado['informacion']['id_season']   = $episodio[$i]['id_season'];
          $episodioFormateado['informacion']['id_episode']  = $episodio[$i]['id_episode'];
          $episodioFormateado['informacion']['titulo']      = $episodio[$i]['titulo'];
          $episodioFormateado['informacion']['descripcion'] = $episodio[$i]['descripcion'];
          $episodioFormateado['imagenes'] = [];
          foreach ($episodio as $key => $ep) {
            if ( $id_temporada == $ep['id_season'] && $id_episodio  == $ep['id_episode'] ){
            if ( file_exists("./".$ep['path_img'] ) ){
              array_push($episodioFormateado['imagenes'], $ep['path_img']);
            }
          }
          }

        }else{
          array_push($arrayTMP, $episodioFormateado);
          $episodioFormateado = [];
          unset($episodioFormateado['imagenes']);

          $id_temporada = $episodio[$i]['id_season'];
          $id_episodio  = $episodio[$i]['id_episode'];
          
          $episodioFormateado['informacion']['id_season']   = $episodio[$i]['id_season'];
          $episodioFormateado['informacion']['id_episode']  = $episodio[$i]['id_episode'];
          $episodioFormateado['informacion']['titulo']      = $episodio[$i]['titulo'];
          $episodioFormateado['informacion']['descripcion'] = $episodio[$i]['descripcion'];
          $episodioFormateado['imagenes'] = [];
          foreach ($episodio as $key => $ep) {
            if ( $id_temporada == $ep['id_season'] && $id_episodio  == $ep['id_episode'] ){
            if ( file_exists("./".$ep['path_img']) ){
              array_push($episodioFormateado['imagenes'], $ep['path_img'] );
            }
          }
          }
          array_push($arrayTMP, $episodioFormateado);
          $episodioFormateado = [];
          $episodioFormateado['imagenes'] = [];    
        }

      }

      var_dump($arrayTMP);
      die();

      return $episodioFormateado;
    }

    //Devuelve todas las temporadas de la DB y todos los episodios de la DB
    public function Temporadas(){
      $temporadas = $this->model->getTemporadas();
      $episodios  = $this->model->getAllEpisodios();
      $this->view->MostrarTemporadas($temporadas, $episodios);
    }

    //Devolver los episodios de una temporada dada
    public function Episodios($param){
      $id_temporada = $param[0];
      if ( isset($param[2]) ){
        $id_episodio  = $param[2];
      }else{
        $id_episodio = NULL;
      }

      // var_dump($param);
      // die();

			$episodiosImagenes = $this->model->getEpisodioImagenes($id_temporada, $id_episodio);
      // var_dump($episodiosImagenes);
      // die();
      //Se unen los dos resultados
      $episodios = $this->formatearEpisodio($episodiosImagenes);
      var_dump($episodios);
      die();
      $this->view->MostrarEpisodios($episodios);
    }

  } //END CLASS

 ?>
