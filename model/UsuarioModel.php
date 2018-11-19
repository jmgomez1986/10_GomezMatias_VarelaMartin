<?php

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = $this->connectToDB();
    }

    private function connectToDB()
    {
        $db = new PDO('mysql:host=localhost;'.'dbname=gameofthrones_db;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    private function disconnect()
    {
        $db =  null;
        return $db;
    }

    public function getUser($user)
    {
        $sentencia = $this->db->prepare("SELECT * FROM user_info WHERE name=?");
        $sentencia->execute(array($user));
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsers()
    {
        $sentencia = $this->db->prepare("SELECT * FROM user_info");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserID($userID)
    {
        $sentencia = $this->db->prepare("SELECT * FROM user_info WHERE id_user=?");
        $sentencia->execute(array($userID));
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertUser($user_name, $user_password, $user_mail, $user_rol)
    {

        try {
            $sentencia = $this->db->prepare("INSERT INTO user_info (name, password, email, rol)
																							VALUES (?,?,?,?)");
            $sentencia->execute(array($user_name, $user_password, $user_mail, $user_rol));

            $last_id = $this->db->lastInsertId();

            $regInsert = $this->getUserID($last_id);

            return $regInsert;
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function setUsers($id_usuario, $usuario_rol)
    {

        try {
            $usuario = $this->getUserID($id_usuario);
            $sentencia = $this->db->prepare("UPDATE `user_info`
																							SET `rol`    = ?
																							WHERE id_user = ?");
            $sentencia->execute(array($usuario_rol, $id_usuario));
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function delUsers($id_usuario)
    {

        try {
            $usuario = $this->getUserID($id_usuario);
            if (!empty($usuario)) {
                $sentencia = $this->db->prepare("DELETE FROM `user_info`
																									WHERE `id_user` = ?");
                $sentencia->execute(array($id_usuario));
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }
} //END CLASS
