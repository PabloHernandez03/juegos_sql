<?php

namespace Controllers;

use Model\Juego;
use Model\Genero;

class APIController{
    public static function juegos(){
        $juegos = Juego::all();
        echo json_encode($juegos);
    }
    public static function generos(){
        $generos = Genero::all();
        echo json_encode($generos);
    }
}