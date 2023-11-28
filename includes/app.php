<?php

use Dotenv;

require "funciones.php";
require "config/database.php";
require __DIR__."/../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

//Conectarenos a la BD
$db = conectarDB();

use Model\ActiveRecord;
// use App\Propiedad;

// $propiedad = new Propiedad();

// var_dump($propiedad);
ActiveRecord::setDB($db);