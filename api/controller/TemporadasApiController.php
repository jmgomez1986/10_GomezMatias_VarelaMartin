<?php
 require_once "Api.php";
 require_once "./../model/TemporadasModel.php";

 class TemporadasApiController extends Api{
   private $model;
   function __construct(){
     parent::__construct();
     $this->model = new TemporadasModel();
   }

   function getTemporadas($param = []){
     if ( !empty($param) ){
       $id_season = $param[':ID'];
       $data = $this->model->getTemporada($id_season);
     }
     else{
       $data = $this->model->getTemporadas();
     }

     if ( !empty($data) ){
       return $this->json_response($data, 200);
     }
     else {
       return $this->json_response(null, 404);
     }
   }

   function getEpisodio($param = []){
     if ( !empty($param) ){
       // var_dump($param);
       $id_season  = $param[':ID1'];
       $id_episode = $param[':ID2'];
       $data = $this->model->getEpisodio($id_season, $id_episode);
     }
     else{
       $data = $this->model->getAllEpisodios();
     }

     if ( !empty($data) ){
       return $this->json_response($data, 200);
     }
     else {
       return $this->json_response(null, 404);
     }
   }

 }

?>
