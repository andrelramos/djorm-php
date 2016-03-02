<?php

namespace MODELS;
use DJORM\Model as BaseModel;

class PersonModel extends BaseModel {
    /*
        TODO The properties should be protected
    */
    protected $name = ['CharField', ['required' => true]];
    protected $phone = ['CharField', ['required' => false]];
}
