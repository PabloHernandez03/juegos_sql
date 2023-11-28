<?php
namespace Model;

class Genero extends ActiveRecord{
    protected static $tabla = 'generos';
    protected static $columnasDB = ["id","nombre"];
    public  $id;
    public $nombre;
    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? "";
    }
    public function validar(){
        if(!$this->nombre){
            self::$errores[] = "Debes añadir un nombre";
        }
        return self::$errores;
    }
}