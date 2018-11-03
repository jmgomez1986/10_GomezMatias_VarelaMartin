<?php

	class UsuarioModel{

		private $db;

		function __construct(){
			$this->db = $this->connectToDB();
		}

		private function connectToDB(){
			$db = new PDO('mysql:host=localhost;'.'dbname=gameofthrones_db;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $db;
		}

		private function disconnect(){
			$db =  null;
			return $db;
		}

		function getUser($user){
	      $sentencia = $this->db->prepare( "select * from user_info where user_name=?");
	      $sentencia->execute(array($user));
	      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
	  }

		function getUserID($userID){
	      $sentencia = $this->db->prepare( "select * from user_info where id_user=?");
	      $sentencia->execute(array($userID));
	      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
	  }

		function insertUser($user_name, $user_password, $user_mail, $user_rol){
			$sentencia = $this->db->prepare("INSERT INTO user_info (user_name, user_password, user_email, user_rol)
																					VALUES (?,?,?,?)");
			$sentencia->execute(array($user_name, $user_password, $user_mail, $user_rol));

			$last_id = $this->db->lastInsertId();

			$regInsert = $this->getUserID($last_id);

			return $regInsert;
		}

	} //END CLASS

?>
