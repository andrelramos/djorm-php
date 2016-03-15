<?php

ini_set("display_errors",1);
ini_set("display_startup_erros",1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';
require_once 'settings.php';

use DJORM\Connection as Conn;
use MODELS\PersonModel;

//PDO Conn
$pdo = new PDO('mysql:host=localhost;dbname='.DB, USER_DB, PASSWORD_DB, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
Conn::dbConn($pdo);

$teste = new PersonModel();
echo 'Testando....';
$teste->save();

echo '<br><br> Funcionou: '.$teste->name;
