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
        "description"=>"regex:/^[\pL\pN\s.,:!?()\"'-]+$/u",
        "biography"=>"regex:/^[\pL\pN\s.,:;!?()\"'-]+$/u",
        "url"=>"regex:/(https?|ftp):\/\/[^\s/$.?#].[^\s]*/"
    ];
}
