<?php

use Model\ActiveRecord;
use Dotenv;

require __DIR__."/../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require "funciones.php";
require "config/database.php";


//Conectarenos a la BD
$db = conectarDB();

ActiveRecord::setDB($db);