<?php

namespace MODELS;
use DJORM\Model as BaseModel;

class PersonModel extends BaseModel {
    /*
        TODO The properties should be protected
    */

    protected $name = ['CharField', ['max_length' => 3, 'default' => '123', 'regex_validator' => '/^([0-9]){3}$/']];
    protected $phone = ['CharField', ['null' => true]];
}
