<?php

require_once __DIR__."/../includes/app.php";

use Controllers\APIController;
use Controllers\LoginController;
use MVC\Router;
use Controllers\JuegoController;
use Controllers\ImageController;

$router = new Router();

// Zona privada
$router->get("/admin",[JuegoController::class,"index"]);
$router->get("/juegos/crear",[JuegoController::class,"crear"]);
$router->post("/juegos/crear",[JuegoController::class,"crear"]);
$router->get("/juegos/actualizar",[JuegoController::class,"actualizar"]);
$router->post("/juegos/actualizar",[JuegoController::class,"actualizar"]);
$router->post("/juegos/eliminar",[JuegoController::class,"eliminar"]);

$router->get("/",[LoginController::class,"login"]);
$router->post("/",[LoginController::class,"login"]);
$router->get("/logout",[LoginController::class,"logout"]);

//API
$router->get("/api/juegos",[APIController::class,"juegos"]);
$router->get("/api/generos",[APIController::class,"generos"]);

$router->comprobarRutas();