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
use DJORM\Fields\CharField;

abstract class Model {

    //Properties
    private $db_conn;


    //Methods
    public function __construct() {
        $this->db_conn = Connection::dbConn();

        $class = get_class($this);
        $class_properties = get_class_vars($class);

        foreach($class_properties as $field => $value) {
            $field_type = $value[0];
            switch($field_type) {
                case 'CharField':
                    if( isset($value[1]) ) { //If rules for field was defined
                        $this->$field = new CharField($value[1]);
                    } else {
                        $this->$field = new CharField();
                    }
                    break;
            }
        }
    }

    public function save() {
        $class = get_class($this);
        $class_properties = get_class_vars($class);
        echo '<br>Save in table ' . $class;
        echo '<ul>';
        foreach($class_properties as $field => $value) {
            //If propertie is a child of IField class
            if ( get_parent_class($this->$field) == 'DJORM\Fields\IFields') {
                echo '<li>'.$field.'('.$value[0].'): '.$this->$field->get().'</li>';
            }
        }
        echo '</ul>';
    }
}
