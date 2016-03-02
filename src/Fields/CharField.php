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
    private $rules; //Rules for this field
    private $value;

    public function __construct($rules=[], $value=''){
        $this->rules = $rules;
        $this->value = $value;
    }

    public function set($value) {
        if(is_string($value) && strlen($value) <= 255) {
            $this->value = $value;
        } else {
            throw new Exception("This field should be a string with max length 255 chars");
        }
    }

    public function get() {
        return $this->value;
    }

    public function verifyFieldRules() {
        echo 'abc';
    }
}
