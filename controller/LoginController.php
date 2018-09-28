<?php

require_once  "./view/LoginView.php";
require_once "./model/UsuarioModel.php";

class LoginController {
	private $view;
	private $model;
	private $titulo;

	 function __construct(){
	 	$this->view = new LoginView();
	 	$this->model = new UsuarioModel();
	 	$this->titulo = "Login";
	 }

	 function login(){
	 	$this->view->login();
	 }

	 function logout(){
	 	header(LOGIN);
	 }

	 function isLogueado(){
	 	return isset($_SESSION["User"]);	
	 }

	 function verifyLogin(){
	 	$user = $_POST["user"];
	 	$pass = $_POST["pass"];
	 	$dbUser = $this->model->getUser($user);

	 	if(isset($dbUser)){
	 		if(password_verify($pass,$dbUser[0]["user_password"])){
	 			session_start();
              	$_SESSION["User"] = $user;
	 			header(HOME);
	 		}
	 		else{
	 			$this->view->login("Contraseña incorrecta");
	 		}
	 	}
	 	else{
	 		$this->view->login("No existe el usuario");
	 	}
	 }

}
?>
