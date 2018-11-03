<?php

/**
 *
 */
	class TemporadasModel{

		private $db;

		function __construct(){
			$this->db = $this->ConnectToDB();
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		private function ConnectToDB(){
			return new PDO('mysql:host=localhost;'.'dbname=gameofthrones_db;charset=utf8', 'root', '');
		}

		function getComentarios(){

			$sentencia = $this->db->prepare("SELECT * FROM comments");
			$sentencia->execute();
			$comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $comentarios;
		}

		function getComentario($temporada, $episodio){

			$sentencia = $this->db->prepare("SELECT * FROM comment WHERE id_season = ? AND
				                                                     			 id_episode = ?");
			$sentencia->execute( array($temporada, $episodio) );
			$comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $comentarios ;
		}

	} //END CLASS

?>
