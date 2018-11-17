<?php

	require_once  "./view/RegistroView.php";
	require_once "./model/UsuarioModel.php";

	class RegistroController {
		private $view;
		private $model;
		private $titulo;
		private $message;

		public function __construct(){
			$this->view   = new RegistroView("Registro", "temporadas", "", "oculto", "oculto", "oculto", "oculto");
		 	$this->model  = new UsuarioModel();
		}

		public function Registro(){
			$this->view->Registro();
		}

		public function Registrar(){
			
			if (isset($_POST["user"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["pass_confirm"])){

				$user           = $_POST["user"];
				$mail           = $_POST["email"];
				$pass           = $_POST["pass"];
				$pass_confirm   = $_POST["pass_confirm"];

				$dbUser = $this->model->getUser($user);

				if (!empty($dbUser)){
					$this->message = "El usuario ya se encuentra registrado";
					$this->view->Registro($this->message);
				}
				else{
					if ( $pass == $pass_confirm ){

						$passEncrypt = password_hash($pass, PASSWORD_DEFAULT);
						$user_rol    = 'Limitado';

						$dbUserRegistrado = $this->model->insertUser($user, $passEncrypt, $mail, $user_rol);

						if (isset($dbUserRegistrado)){
							session_start();
							$_SESSION['usuario'] = $user;
							$_SESSION['rol']     = $user_rol;
							header(TEMPUSER);
						}
						else{
							$this->message = "Error interno al realizar el registro, intente nuevamente";
							$this->view->Registro($this->message);
						}
					}
					else{
						$this->message = "Las contraseñas no coinciden";
						$this->view->Registro($this->message);
					}
				}
			}
			else{
				$this->message = "Datos faltantes";
				$this->view->Registro($this->message);
			}
		}

	} //ENDCLASS
