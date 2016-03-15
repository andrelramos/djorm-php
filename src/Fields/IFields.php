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

     protected $rules; //Array of rules for field
     protected $field_value;

     /* Rules */
     private $null = false;

     abstract public function set($value);
     abstract public function get();

     public function __construct($rules=[]){
         $this->rules = $rules;
         $this->field_value = null;

         /* Define rules */

          //null
         if(isset($this->rules['null'])) {
             $this->null = $this->rules['null'];
         }

     }

     public function verifyFieldRules() {
        // Verify required rule
        if(!$this->null && $this->field_value == null) {
            throw new Exception("This field should not be null");
        }
     }
 }
