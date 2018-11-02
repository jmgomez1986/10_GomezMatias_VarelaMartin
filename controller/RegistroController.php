<?php

	require_once  "./view/RegistroView.php";
	require_once "./model/UsuarioModel.php";

	class RegistroController {
		private $view;
		private $model;
		private $titulo;
		private $message;

		function __construct(){

			$this->view   = new RegistroView("Login", "temporadas", "", "oculto", "oculto");
		 	$this->model  = new UsuarioModel();

		}

		function Registro(){
			$this->view->Registro();
		}

    function Registrar(){
      $user           = $_POST["user"];
      $user           = $_POST["mail"];
		 	$pass           = $_POST["pass"];
      $pass_confirm   = $_POST["pass_confirm"];

		 	$dbUser = $this->model->getUser($user);

      header(TEMPO);

		}

	} //END CLASS

?>
