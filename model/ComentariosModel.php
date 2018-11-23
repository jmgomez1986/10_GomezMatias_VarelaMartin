<?php

require_once "config/ConfigApp.php";

class TemporadasModel
{
    private $db;

    public function __construct()
    {
        $this->db = $this->connectToDB();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function connectToDB()
    {
         return new PDO('mysql:host='.ConfigApp::$host.';dbname='.ConfigApp::$DBname.';charset=utf8', ConfigApp::$DBuser, ConfigApp::$DBpass);
    }

    public function getComentarios($id = "")
    {

        $parameters = array();

        if (isset($id)) {
            $condicion = "id_comment = ?";
            array_push($parameters, $id);
        } else {
            $condicion  = 1;
            $parameters = [];
        }

        $sentencia = $this->db->prepare("SELECT * FROM comment WHERE $condicion");
        $sentencia->execute($parameters);
        $comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $comentarios;
    }

    public function getComentario($temporada, $episodio, $sortCriterio = '')
    {

        if ($sortCriterio != '') {
            $column = 'score';
            $sort   = $sortCriterio;
        } else {
            $column = 'id_comment';
            $sort   = 'ASC';
        }

        $sentencia = $this->db->prepare("SELECT comment.*, user_info.name FROM comment, user_info
																					WHERE comment.id_user = user_info.id_user AND
																								comment.id_season  = ? AND
																								comment.id_episode = ?
																					ORDER BY $column $sort");
        $sentencia->execute(array($temporada, $episodio));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $comentarios ;
    }

    public function delComentario($id)
    {
        try {
            $comment = $this->getComentarios($id);
            if (!empty($comment)) {
                $sentencia = $this->db->prepare("DELETE FROM `comment`
																									WHERE `id_comment` = ?");
                $sentencia->execute(array($id));
                return $comment;
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function saveComentario($idSes, $idEp, $idU, $com, $score)
    {
        try {
            $sentencia = $this->db->prepare("INSERT INTO comment ( id_season, id_episode, id_user,comment,score)
																								VALUES (?,?,?,?,?)");
            $sentencia->execute(array($idSes, $idEp, $idU, $com, $score));
            $lastId =  $this->db->lastInsertId();
            return $this->getComentarios($lastId);
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function editComentario($idCom, $idSes, $idEp, $idU, $com, $score)
    {
        try {
            $sentencia = $this->db->prepare("UPDATE `comment`
																							SET `id_comment` = ?,
																									`id_season`  = ?,
																									`id_episode` = ?,
																									`id_user`    = ?,
																									`comment`    = ?,
																									`score`      = ?
																							WHERE id_comment  = ?");
            $sentencia->execute(array($idCom, $idSes, $idEp, $idU, $com, $score));
        } catch (PDOException $exception) {
             return $exception->getMessage();
        }
    }
} //END CLASS
