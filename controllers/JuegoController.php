<?php

namespace Controllers;
use MVC\Router;
use Model\Juego;
use Model\Genero;
use Intervention\Image\ImageManagerStatic as Image;

class JuegoController{
    public static function index(Router $router){
        $db = conectarDB();
        $juegos = Juego::all();
        $generos = Genero::all();
        $resultado = $_GET['resultado'] ?? null;
        $result = $db->query("SELECT GROUP_CONCAT(generos.nombre SEPARATOR ', ') AS generos FROM juegos JOIN juegos_generos ON juegos.id=juegos_generos.id_juego JOIN generos ON generos.id=juegos_generos.id_genero GROUP BY juegos.id;");
        $juegos_generos = [];
        while($registro = $result->fetch_assoc()){
            $juegos_generos[] = $registro;
        }
        $router->render("/juegos/admin",[
            "juegos_generos"=>$juegos_generos,
            "resultado"=>$resultado,
            "juegos"=>$juegos,
            "generos"=>$generos,
            ]);
    }
}