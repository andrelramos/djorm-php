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
    private $db_conn_;

    //Methods
    public function __construct() {
        $this->db_conn_ = Connection::dbConn();

        $class_properties = get_class_vars(get_class($this));

        foreach($class_properties as $field => $value) {
            /* Jumping db_conn_, because they are not a field property
            defined in a model class */
            if(substr($field, -1) == '_') {
                continue;
            }

            $field_type = $value[0];
            switch($field_type) {
                case 'CharField':
                    $this->$field = new CharField($value[1]);
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
                $this->$field->verifyFieldRules();
                echo '<li>'.$field.'('.$value[0].'): '.$this->$field->get().'</li>';
            }
        }
        echo '</ul>';
    }

    /* Overloading functions */

    public function __set($name, $value) {
        $this->$name->set($value);
    }

    public function __get($name) {
        return $this->$name->get();
    }

}
