<?php
/**
 *   Class to create char fields in models class
 *
 * @category Model
 * @package  DJORM\Fields
 * @author   André Ramos <andrel.ramos97@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GPL
 * @link     https://github.com/andrelramos/djorm-php
 *
 */

namespace DJORM\Fields;

use Exception;
use DJORM\Fields\IFields;

class CharField extends IFields {

    private $default = null;
    private $max_length = 255;
    private $regex_validator = null;

    public function __construct($rules=[]) {
        parent::__construct($rules);

        /* Define rules */

         //default
        if( isset($this->rules['default']) ) {
            $this->default = $this->rules['default'];
        }

         //max_length
        if( isset($this->rules['max_length']) ) {
            $this->max_length = $this->rules['max_length'];
        }

        //regex_validator
       if(isset($this->rules['RegexValidator']) && is_string($this->rules['RegexValidator'])) {
           $this->regex_validator = $this->rules['RegexValidator'];
       }

    }

    public function set($value) {
        $this->field_value = $value;
    }

    public function get() {
        return $this->field_value;
    }

    public function verifyFieldRules() {
        /**
        *   @return true if the value in field is according with rules
        */

        if($this->field_value == null && $this->default != null) {
            $this->set($this->default);
        }

        if(!is_string($this->field_value) && $this->field_value != null) {
            throw new Exception("This field should be a string");
        } else if(strlen($this->field_value) > $this->max_length) {
            throw new Exception("The max length of this field is ".$this->max_length);
        } else if($this->regex_validator != null && !preg_match($this->regex_validator, $this->field_value) ) {
            throw new Exception("This format is invalid");
        }

        parent::verifyFieldRules();

        return true;
    }
}
