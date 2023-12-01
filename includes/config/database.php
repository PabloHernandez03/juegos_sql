<?php

function conectarDB(): mysqli{//host,usuario,contraseña,BD
    $db = new mysqli(
        $_ENV["DB_HOST"],
        $_ENV["DB_USER"],
        $_ENV["DB_PASS"],
        $_ENV["DB_NAME"]
    );
    mysqli_set_charset($db, 'utf8');
    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
}