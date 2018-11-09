<?php

  require_once "./view/ComentariosView.php";
  require_once "LoginController.php";

  class ComentariosController{

    private $view;
    private $login;
    private $link;
    private $script;
    private $claseLogin;
    private $claseLogout;
    private $claseReg;
    private $logueado;
    private $rol;

    function __construct(){

      $this->login  = new LoginController();

      $arrayReg = $this->login->isLogueado();
      if (  (!empty($arrayReg)) && $arrayReg['logueado'] ){
        $this->claseLogin  = "oculto";
        $this->claseLogout = "visible";
        $this->claseReg    = "oculto";
        $this->link        = "temporadasUser";
        $this->logueado    = true;
      }
      else{
        $this->claseLogin  = "visible";
        $this->claseLogout = "oculto";
        $this->claseReg    = "visible";
        $this->link        = "temporadas";
        $this->logueado    = false;
      }

      if (!empty($arrayReg)){
        $this->rol = $arrayReg['rol'];
      }
      else {
        $this->rol = "none";
      }

      $this->script      = "js/main.js";

      $this->view   = new ComentariosView("Game of Thrones", $this->link, $this->script, $this->claseLogin, $this->claseLogout, $this->claseReg, $this->logueado, $this->rol);

    }

    function getComentarios($params=[]){

      $id_temporada = '';
      $id_episodio  = '';

      if ( !empty($params) ){
        if (isset($params[1]) && isset($params[3]) ){
          $id_temporada = $params[1];
          $id_episodio  = $params[3];
        }
      }

      $this->view->getComentarios($id_temporada, $id_episodio);
    }

    function agregarComentarioForm($params=[]){

      if ( isset($_POST["idTemp"]) && isset($_POST["idEpis"]) ){
        $id_temporada  = $_POST["idTemp"];
        $id_episodio   = $_POST["idEpis"];
        if ( isset($_POST["verifyCaptcha"]) ){
          $verifyCaptcha = $_POST["verifyCaptcha"];
        }else{
          $verifyCaptcha = '';
        }
      }else{

      }

      $user_name    = $this->login->getUser();
      $id_user      = $this->login->getUserID($user_name);

      $this->view->addComment($id_temporada, $id_episodio, $id_user[0]['id_user'], $this->script, $verifyCaptcha);
    }

    function validarCaptcha($params=[]){

      $recaptcha = $_POST["g-recaptcha-response"];
      $url = 'https://www.google.com/recaptcha/api/siteverify';
      $data = http_build_query( array( 'secret'   => '6Lf9l3kUAAAAAHvx3L_UPaWJf0EyaDKwS-SxiFxe',
                                       'response' => $recaptcha,
                                       'remoteip' => $_SERVER['REMOTE_ADDR']
                                     )
                              );
      $options = array(
        'http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $data
        )
      );
      $context = stream_context_create($options);
      $verify = file_get_contents($url, false, $context);
      $captcha_success = json_decode($verify);


      if ( isset($_POST["idTemp"]) && isset($_POST["idEpis"]) ){
        $id_temporada = $_POST["idTemp"];
        $id_episodio  = $_POST["idEpis"];
      }
      if ( $captcha_success->success ){
        // $_POST["verifyCaptcha"] = 'ok';
        echo "OK";
        $url = '/comentarios/temporada/'.$id_temporada.'/'.'episodio/'.$id_episodio;
        // header('Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). $url);
      }else{

        $user_name    = $this->login->getUser();
        $id_user      = $this->login->getUserID($user_name);
        $url = 'agregarComentario/'.$id_temporada.'/'.$id_episodio;
        $urlAgregar = 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/'.$url;

        header($urlAgregar);
      }


    }

  } //END CLASS

 ?>
