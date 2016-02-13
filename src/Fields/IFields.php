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
 
 interface IFields {
     public function setValue();
     public function getValue();
 }