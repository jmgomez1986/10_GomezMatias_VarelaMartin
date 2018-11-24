<?php

require_once  "./view/LoginView.php";
require_once "./model/UsuarioModel.php";

class LoginController
{

    private $view;
    private $model;
    private $titulo;
    private $message;

    public function __construct()
    {
        $this->view   = new LoginView("Login", "temporadas", "", "oculto", "oculto", "visible", "oculto");
        $this->model  = new UsuarioModel();
    }

    public function login($params = [])
    {

        if (isset($params[0])) {
            if ($params[0] == 'timeout') {
                $this->message = 'Sesion expirada';
            } elseif ($params[0] == 'userFail') {
                $this->message = 'Sesion no iniciada';
            }
        }

        $this->view->login($this->message);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header(HOME);
    }

    public function isLogueado()
    {
        session_start();
        $register = array();
        if (isset($_SESSION['usuario'])) {
            $register = [ 'logueado' => true,
                          'rol'      => $_SESSION['rol'] ];
        }

        return $register;
    }

    public function verifyLogin()
    {
        $user   = $_POST["user"];
        $pass   = $_POST["pass"];
        if (isset($_POST["user"]) && isset($_POST["pass"])) {
            $dbUser = $this->model->getUser($user);
            if (!empty($dbUser)) {
                if (password_verify($pass, $dbUser[0]["password"])) {
                    session_start();
                    $_SESSION['usuario'] = $user;
                    $_SESSION['rol']     = $dbUser[0]['rol'];
                    header(TEMPUSER);
                } else {
                    $this->view->login("Contraseña incorrecta");
                }
            } else {
                $this->view->login("No existe el usuario");
            }
        }
    }

    public function getUser()
    {

        if (isset($_SESSION['usuario']) && ($_SESSION['usuario'] != '')) {
            $user = $_SESSION['usuario'];
            return $user;
        } else {
            return null;
        }
    }

    public function getUserID($user_name)
    {
        return $this->model->getUser($user_name);
    }
} //ENDCLASS
