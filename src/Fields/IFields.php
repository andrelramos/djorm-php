<?php
/**
 *   Interface to class fields
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

 abstract class IFields {

     protected $rules; //Rules for field
     protected $field_value;

     abstract public function set($value);
     abstract public function get();

     public function __construct($rules=[]){
         $this->rules = $rules;
         $this->field_value = null;
     }

     public function verifyFieldRules() {
        foreach($this->rules as $rule => $value) {
            if($rule == 'required') {
                if($value == true && $this->field_value == null) {
                    throw new Exception("This field should not be null");
                }
            }
        }
     }
 }
