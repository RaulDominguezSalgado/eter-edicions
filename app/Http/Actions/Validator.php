<?php

namespace App\Http\Actions;


/**
 * Class AuthorController
 * @package App\Http\Controllers
 */
class Validator
{
    public static $validations= [
        "first_name" =>"regex:/^[\pL\s'-]+$/u",
        "last_name"=>"regex:/^[\pL\s'-]+$/u",
        "name"=>"regex:/^[\pL\s'-]+$/u",
        "description"=>"reggex:/^[\pL\pN\s.,!?\"'-]+$/u",
        "biography"=>"reggex:/^[\pL\pN\s.,!?\"'-]+$/u",
    ];
}
