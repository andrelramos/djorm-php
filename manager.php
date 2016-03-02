<?php
/**
 *   File to assist the developers to manager your database
 *
 * @category Manager
 * @package  DJORM
 * @author   André Ramos <andrel.ramos97@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GPL
 * @link     https://github.com/andrelramos/djorm-php
 *
 */
require 'vendor/autoload.php';
require 'settings.php';

use DJORM\Connection as Conn;
use MODELS;

//Get args and transform to $_GET array
parse_str(implode('&', array_slice($argv, 1)), $_GET);

if( isset($_GET['migrate']) ) {
    migrate();
}

function db_connect() {
    $pdo = new PDO('mysql:host=localhost;dbname='.DB, USER_DB, PASSWORD_DB, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    Conn::dbConn($pdo);
}

/* functions */
function migrate() {
    echo " __________________________ \n";
    echo "|                          |\n";
    echo "|      RUN MIGRATE...      |\n";
    echo "|        WAIT PLS          |\n";
    echo "|__________________________|\n\n\n";

    db_connect();
}
