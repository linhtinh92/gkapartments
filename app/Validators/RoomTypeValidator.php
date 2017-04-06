<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class RoomTypeValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title'=>'required',
            'apartment_id'=>'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
