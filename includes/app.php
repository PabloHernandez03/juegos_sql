<?php
require "funciones.php";
require "config/database.php";
require __DIR__."/../vendor/autoload.php";

//Conectarenos a la BD
$db = conectarDB();

use Model\ActiveRecord;
// use App\Propiedad;

// $propiedad = new Propiedad();

// var_dump($propiedad);
ActiveRecord::setDB($db);