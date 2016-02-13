<?php
/**
 *   Base class to construct new models
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
use DJORM\Connection;

abstract class Model {
 
    //Properties
    private $db_conn;
    
    
    //Methods
    public function __construct() {
        $this->db_conn = Connection::dbConn();
    }
    
    public function save(){
       
        $class = get_class($this);
        $class_properties = get_class_vars($class);
        echo '<br>Save in table ' . get_called_class();
        echo '<ul>';
        foreach($class_properties as $column => $value) {
            echo '<li>'.$column.': '.$value[0].'</li>';
        }
        echo '</ul>';
    }
}