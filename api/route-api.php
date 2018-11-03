<?php

require_once 'Router.php';
require_once 'controller/ComentariosApiController.php';

$r = new Router();

// rutas de la api

$r->addRoute("comentarios","GET", "ComentariosApiController", "getComentarios");
$r->addRoute("comentarios/temporada/:ID1/episodio/:ID2", "GET", "ComentariosApiController", "getComentarios");
$r->addRoute("comentarios/:ID", "DELETE", "ComentariosApiController", "delComentario");
$r->addRoute("comentarios", "POST", "ComentariosApiController", "saveComentario");
//$r->addRoute("comentarios/:ID","PUT", "ComentariosApiController", "editComentario");

//run
$r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
