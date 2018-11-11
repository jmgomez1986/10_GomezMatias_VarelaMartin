<?php

	require_once "./view/UsuarioView.php";
	require_once "./model/UsuarioModel.php";
	require_once "SecuredController.php";

	class UsuariosAdminController extends SecuredController {

		private $rol;
		private $script;
		private $view;
	  private $model;

		function __construct(){
				parent::__construct();

				$this->rol         = $_SESSION['rol'];
				if ( $this->rol == "Administrador" ){
					$this->script = "";
				}

				$this->view        = new UsuarioView("Game of Thrones", "temporadasUser", $this->script, "oculto", "visible", "oculto", true, $this->rol);
				$this->model       = new UsuarioModel();
		}

		function GetUsuarios(){

	    $usuarios = $this->model->getUsers();
	    $this->view->MostrarUsuarios($usuarios);

	  }

		function GuardarAdminUsuarios(){

			$usuarios = array();
			$id_usuarios = [];
			$array = array();

			var_dump($_POST);
			die();

			if ( !empty($_POST) ){
				$usuarios = $_POST;

				foreach ($usuarios as $key => $value) {
					$id_user = explode('-', $key);
					$array['id']  = $id_user[0];
					$array['rol'] =  $value;
					array_push($id_usuarios, $array);
				}
			}

			for ($i=0; $i < count($id_usuarios); $i++) {
				$usuarios = $this->model->setUsers($id_usuarios[$i]['id'], $id_usuarios[$i]['rol']);
			}
			// var_dump($id_usuarios);
			// die();

		}

	} // ENDCLASS

?>
