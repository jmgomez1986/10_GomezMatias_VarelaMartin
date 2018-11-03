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

		function getComentarios($id){
			if(!empty($id)){ $condicion = "$id_comment = $id"; }
			else { $condicion = 1; }
			$sentencia = $this->db->prepare("SELECT * FROM comment WHERE $condicion");
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

		function delComentario($id){
			try{
				$comment = $this->GetComentarios($id);
				if(isset($comment)){
					$sentencia = $this->db->prepare("DELETE FROM `comment`
									                         	WHERE `id_comment` = ?");
		    	$sentencia->execute(array($id));
					return $comment;
				}
	    }
	    catch(PDOException $exception){
				return $exception->getMessage();
			}
		}

		function saveComentario($idCom,$idSes,$idEp,$idU,$com,$score){
			try{
				$sentencia = $this->db->prepare("INSERT INTO comment (id_comment, id_season, id_episode, id_user,comment,score)
																						VALUES (?,?,?,?,?,?)");
				$sentencia->execute( array($idCom, $idSes, $idEp, $idU, $com, $score) );
			}
			catch(PDOException $exception){
				 return $exception->getMessage();
			}
		}

		function editComentario($idCom,$idSes,$idEp,$idU,$com,$score){
			try{
				$sentencia = $this->db->prepare("UPDATE `comment`
																						SET `id_comment` = ?,
																						    `id_season`  = ?,
																								`id_episode` = ?,
																								`id_user`    = ?,
																								`comment`    = ?,
																								`score`    = ?
																						WHERE id_comment  = ?");
				$sentencia->execute( array($idCom,$idSes,$idEp,$idU,$com,$score) );
			}
			catch(PDOException $exception){
				return $exception->getMessage();
			}
		}

	} //END CLASS

?>
