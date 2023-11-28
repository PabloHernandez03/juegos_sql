<?php

namespace Model;

class Admin extends ActiveRecord{
    //Base de datos
    protected static $tabla = "usuarios";
    protected static $columnasDb = ["id","email","password","admin"];

    public $id;
    public $email;
    public $password;
    public $admin;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->email = $args["email"] ?? "";
        $this->password = $args["password"] ?? "";
        $this->admin = $args["admin"] ?? 0;
    }

    public function validar(){
        if(!$this->email){
            self::$errores[] = "El email es obligatorio";
        }
        if(!$this->password){
            self::$errores[] = "La contraseña es obligatoria";
        }
        return self::$errores;
    }

    public function existeUsuario(){
        //Revisar si un usuario existe o no
        $query = "SELECT * FROM ".self::$tabla." WHERE email='".$this->email."' LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows){
            self::$errores[] = "El usuario no existe";
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();
        $autenticado = password_verify($this->password,$usuario->password);
        if(!$autenticado){
            self::$errores[] = "El password es incorrecto";
        }
        return $autenticado;
    }

    public function autenticar($resultado){
        $query = "SELECT * FROM ".self::$tabla." WHERE email='".$this->email."' LIMIT 1";
        $resultado = self::$db->query($query);
        $usuario = $resultado->fetch_object();
        if($usuario->admin==="1"){
            session_start();
            $_SESSION["login"]=true;
            header("Location: /admin");
        }else{
            header("Location: /");
        }
    }
}