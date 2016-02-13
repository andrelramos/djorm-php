<?php

require_once 'vendor/autoload.php';

use DJORM\Connection as Conn;
use DJORM\Model as BaseModel;
use DJORM\Fields\CharField;

class TesteModel extends BaseModel {
    public $teste = ['CharField', ['required' => true]];
    public $teste2 = ['CharField'];
}

//PDO Conn
$pdo = new PDO('mysql:host=localhost;dbname=test_djorm', 'root', 'password', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));    
Conn::dbConn($pdo);

$teste = new TesteModel();
echo 'Testando....';
$teste->save();