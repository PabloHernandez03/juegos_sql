<?php

function conectarDB(): mysqli{//host,usuario,contraseña,BD
    $db = new mysqli("localhost","root","root","juegos_sql");
    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
}