<?php
/**
 * This class is responsible to manage the connection with a database
 *
 * @category Model
 * @package  DJORM
 * @author   André Ramos <andrel.ramos97@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GPL
 * @link     https://github.com/andrelramos/djorm-php
 *
 */
    
namespace DJORM;

use Exception;

class Connection {
    
    //Properties
    public static $connection;
    
    //Methods
    public static function dbConn($pdo_driver = null) {

        if(!isset(self::$connection)) {
            if($pdo_driver === null) {
                throw new Exception('No connection has been established . It is necessary to enter with a PDO driver as argument.');
            }
            self::$connection = $pdo_driver;
        }
        
        return self::$connection;
    }
    
}