<?php

namespace MODELS;
use DJORM\Model as BaseModel;

class PersonModel extends BaseModel {
    public $name = ['CharField', ['required' => true]];
    public $phone = ['CharField'];
}
