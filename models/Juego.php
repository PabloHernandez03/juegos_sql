<?php
namespace Model;

class Juego extends ActiveRecord{
    protected static $tabla = 'juegos';
    protected static $columnasDB = ["id","nombre","autor","descripcion","link","imagen"];
    public  $id;
    public $nombre;
	public $autor;
	public $genero = array();
	public $descripcion;
	public $link;
	public $imagen;
    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? "";
        $this->autor = $args["autor"] ?? "";
        $this->genero = $args["genero"] ?? array();
        $this->descripcion = $args["descripcion"] ?? "";
        $this->link = $args["link"] ?? "";
        $this->imagen = $args["imagen"] ?? "";
    }
    public function validar(){
        if(!$this->nombre){
            self::$errores[] = "Debes añadir un título";
        }
        if(!$this->autor){
            self::$errores[] = "Debes añadir un autor";
        }
        if(!$this->genero){
            self::$errores[] = "Debes añadir un género";
        }
        if(!$this->descripcion){
            self::$errores[] = "Debes añadir un descripción";
        }
        if(!$this->link){
            self::$errores[] = "Debes añadir un enlace";
        }
        return self::$errores;
    }
}