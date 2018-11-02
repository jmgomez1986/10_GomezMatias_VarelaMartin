<?php

require_once 'Router.php';
require_once 'api/TaskApiController.php';

$r = new Router();

// rutas de la api
$r->addRoute("comentarios","GET", "ComentariosApiController", "getComentarios");
$r->addRoute("comentarios/:ID", "GET", "ComentariosApiController", "getTasks");
$r->addRoute("comentarios/:ID", "DELETE", "ComentariosApiController", "deleteTask");
$r->addRoute("comentarios", "POST", "ComentariosApiController", "saveTask");
$r->addRoute("comentarios/:ID","PUT", "ComentariosApiController", "editTask");

//run
$r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
