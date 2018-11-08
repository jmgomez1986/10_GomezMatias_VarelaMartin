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

		function getComentarios($id = 0){

			if(!empty($id)){
				$condicion = "id_comment = $id";
			}
			else {
				$condicion = 1;
			}
			$sentencia = $this->db->prepare("SELECT * FROM comment WHERE $condicion");
			$sentencia->execute();
			$comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $comentarios;
		}

		function getComentario($temporada, $episodio, $sortCriterio=''){

			if ( $sortCriterio != '' ){
				$sort = $sortCriterio;	
			}else{
				$sort = 'ASC';
			}
			
			$sentencia = $this->db->prepare("SELECT comment.*, user_info.name FROM comment, user_info
																				WHERE comment.id_user    = user_info.id_user AND
																							comment.id_season  = ?                 AND
				                                      comment.id_episode = ?
				                                      ORDER BY score $sort");
			$sentencia->execute( array($temporada, $episodio) );
			$comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $comentarios ;
		}

		function delComentario($id){
			try{
				$comment = $this->GetComentarios($id);
				if(!empty($comment)){
					$sentencia = $this->db->prepare("DELETE FROM `comment`
									                         	WHERE `id_comment` = ?");
		    	$sentencia->execute(array($comment[0]['id_comment']));
					return $comment;
				}
	    }
	    catch(PDOException $exception){
				return $exception->getMessage();
			}
		}

		function saveComentario($idSes,$idEp,$idU,$com,$score){
			try{
				$sentencia = $this->db->prepare("INSERT INTO comment ( id_season, id_episode, id_user,comment,score)
																						VALUES (?,?,?,?,?)");
				$sentencia->execute( array($idSes, $idEp, $idU, $com, $score) );
				$lastId =  $this->db->lastInsertId();
				return $this->getComentarios($lastId);
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
