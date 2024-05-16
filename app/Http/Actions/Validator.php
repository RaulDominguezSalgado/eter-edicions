<?php

namespace App\Http\Actions;


/**
 * Class AuthorController
 * @package App\Http\Controllers
 */
class Validator
{
    public static $validations= [
        "string_only_letters"=>"regex:/^[\pL\s'-]+$/u",
        "string_only_numbers"=>"regex:/^[\pN\s'-]+$/u",
        "alphanumeric" =>"regex:/^[\pN\pL\s]+$/u",
        "decimal"=>"decimal:0,2",
        "integer"=>"integer",
        "date"=>"date",
        "boolean"=>"boolean",
        "pdf"=>"file|mimes:pdf",
        "array" =>"array",
        "image" =>"image|mimes:jpeg,jpg,png,gif,webp,tiff,bmp",
        "first_name" =>"regex:/^[\pL\s'-]+$/u",
        "last_name"=>"regex:/^[\pL\s'-]+$/u",
        "name"=>"regex:/^[\pL\s'-]+$/u",
        "title"=>"regex:/^[\pL\s'-]+$/u",
        "enviromental_footprint" =>"regex:/^[\pN\pL\s-]+$/u",
        "description"=>"regex:/^[\pL\pN\s'.,:;!?()\"’-]+$/u",
        "biography"=>"regex:/^[\pL\pN\s'.,:;!?()\"’-]+$/u",
        'url' => 'url:http,https',
        "email"=>"email:rfc,dns",
        'isbn' => 'regex:/^(?:\d{3}(?:-|\s)?\d{2}(?:-|\s)?\d{6}(?:-|\s)?\d{1}(?:-|\s)?\d)$/',
        "legal_diposit"=>"regex:/^B\s?\d{4}(?:-|\s)?\d{4}$/",
        "dimensions"=>"regex:/^\d+\s?x\s?\d+\s?cm$/"
    ];
}
