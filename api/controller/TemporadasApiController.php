<?php
 require_once "Api.php";
 require_once "./../model/TemporadasModel.php";

 class TemporadasApiController extends Api{
   private $model;
   function __construct(){
     parent::__construct();
     $this->model = new TemporadasModel();
   }

   function getTemporadas($param = null){
     if(isset($param)){
       $id_season = $param[0];
       $data = $this->model->getTemporada($id_season);
     }
     else{
       $data = $this->model->getTemporadas();
     }
     if(isset($data)){
       return $this->json_response($data, 200);
     }
     else {
       return $this->json_response(null, 404);
     }
   }


 }
?>
