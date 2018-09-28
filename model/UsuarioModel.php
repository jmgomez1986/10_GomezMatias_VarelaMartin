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
      $sentencia = $this->db->prepare( "select * from user_admin where user_name=?");
      $sentencia->execute(array($user));
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }


}
?>