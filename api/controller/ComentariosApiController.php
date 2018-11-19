<?php

 require_once "Api.php";
 require_once "./../model/ComentariosModel.php";

class ComentariosApiController extends Api
{

    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TemporadasModel();
    }

    public function getComentarios($param = [])
    {
        if (!empty($param)) {
            $id_season    = $param[':ID1'];
            $id_episode   = $param[':ID2'];
            if (isset($_GET['Sort'])) {
                $sortCriterio = $_GET['Sort'];
            } else {
                $sortCriterio = '';
            }
            $this->data = $this->model->getComentario($id_season, $id_episode, $sortCriterio);
        } else {
            $this->data = $this->model->getComentarios();
        }

        if (!empty($this->data)) {
            return $this->jsonResponse($this->data, 200);
        } else {
            return $this->jsonResponse([], 200);
        }
    }

    public function delComentario($param = [])
    {
        if (!empty($param)) {
            $id_comment = $param[':ID'];
            $response = $this->model->delComentario($id_comment);
        }
    }

    public function saveComentario($param = [])
    {
        $objetoJson = $this->getJSONData();
        $resp = $this->model->saveComentario($objetoJson->id_season, $objetoJson->id_episode, $objetoJson->id_user, $objetoJson->comment, $objetoJson->score);
        return $this->jsonResponse($resp, 200);
    }
}
