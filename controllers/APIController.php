<?php

namespace Controllers;
require_once("../includes/config/database.php");

use Model\Juego;
use Model\Genero;


function crearObjeto($registro){
	$objeto = new Juego;
	foreach($registro as $key => $value){
		if(property_exists($objeto, $key) && is_array($objeto->$key)){
			$datos = explode(",", $value);
			foreach($datos as $dato){
				$objeto->$key[] = $dato;
			}
		}else if(property_exists($objeto, $key)){
			$objeto->$key = $value;
		}
	}
	return $objeto;
}

class APIController{
    public static function juegos(){
        $sql = "SELECT juegos.id,juegos.nombre,autor,descripcion,link,GROUP_CONCAT(generos.nombre SEPARATOR ',') AS genero,imagen FROM juegos JOIN juegos_generos ON juegos.id=juegos_generos.id_juego JOIN generos ON generos.id=juegos_generos.id_genero GROUP BY juegos.id;";
        $db = conectarDB();
        $resultado = $db->query($sql);
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = crearObjeto($registro);
        }
        header('Access-Control-Allow-Origin: *');
        echo json_encode($array);
    }
    public static function generos(){
        $generos = Genero::all();
        header('Access-Control-Allow-Origin: *');
        echo json_encode($generos);
    }
}