<?php
 require_once "Api.php";
 require_once "./../model/ComentariosModel.php";

 class ComentariosApiController extends Api{

   private $model;

   function __construct(){
     parent::__construct();
     $this->model = new TemporadasModel();
   }

   function getComentarios($param = []){
     if ( !empty($param) ){
       $id_season  = $param[':ID1'];
       $id_episode = $param[':ID2'];
       $data = $this->model->getComentario($id_season, $id_episode);
     }
     else{
       $data = $this->model->getComentarios();
     }

     if ( !empty($data) ){
       return $this->json_response($data, 200);
     }
     else {
       return $this->json_response(null, 404);
     }
   }

   function delComentario($param = []){
     if ( !empty($param) ){
       $id_comment = $param[':ID'];
       $response = $this->model->delComentario($id_comment);
     }
   }

 }

?>
