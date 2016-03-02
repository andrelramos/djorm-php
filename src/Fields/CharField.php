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

        if($this->field_value) { //If field_value is not empty
            if(!is_string($this->field_value) || strlen($this->field_value) > 255) {
                throw new Exception("This field should be a string with max length 255 chars");
            }
        }

        parent::verifyFieldRules();

    }
}
