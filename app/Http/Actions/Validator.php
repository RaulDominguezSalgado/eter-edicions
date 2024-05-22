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
        'time' => "regex:/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/",
        "boolean"=>"boolean",
        "pdf"=>"file|mimes:pdf",
        "array" =>"array",
        "image" =>"image","mimes:jpeg,jpg,png,gif,webp,tiff,bmp",
        "first_name" =>"regex:/^[\pL\s'-]+$/u",
        "last_name"=>"regex:/^[\pL\s'-]+$/u",
        "name"=>"regex:/^[\pL\s'-]+$/u",
        "title"=>"regex:/^[\pL\s'-]+$/u",
        "enviromental_footprint" =>"regex:/^[\pN\pL\s-]+$/u",
        "description"=>"regex:/^[\pL\pN\s'.,·:;¡!¿‘–<>«»?()\"’-]+$/u",
        "biography"=>"regex:/^[\pL\pN\s'.,·:;¡!¿‘–<>«»?()\"’-]+$/u",
        'url' => 'url:http,https',
        "email"=>"email:rfc,dns",
        'isbn' => 'regex:/^(?:\d{3}(?:-|\s)?\d{2}(?:-|\s)?\d{6}(?:-|\s)?\d{1}(?:-|\s)?\d)$/',
        "legal_diposit"=>"regex:/^B\s?\d{4}(?:-|\s)?\d{4}$/",
        "dimensions"=>"regex:/^\d+\s?x\s?\d+\s?cm$/",
        "reference"=>"regex:/^\d{14}[0-9A-Z]{6}$/",
        "phone"=>"regex:/^(\+)?[\d\s()-]+$/",
        "address"=>"regex:/^[\pL\pN\s'.,·:;¡!¿‘–<>«»?()\"’-]+$/u",
        "address_number"=>"regex:/^[\pL\pN\s'.,·‘–()\"’-]+$/u",
        "zip_code"=>"regex:/^\d{5}(?:\s[a-zA-Z]{2})?$/",
        "strict_password"=>"regex:/^(?=.*[A-Z])(?=.*[^\w]).{8,}$/", // (?=.*[A-Z]) indica que debe haber al menos una letra mayúscula (?=.*[^\w]) indica que debe haber al menos un carácter especial (no alfanumérico) {8,} indica que el campo debe tener al menos 8 caracteres
        "slug"=>"regex:/^[a-z0-9]+(-[a-z0-9]+)*$",
    ];


    /**
     * Validate Spanish DNI.
     *
     * @param string $dni
     * @return bool
     */
    public static function isValidDni($dni)
    {
        $dni = strtoupper(str_replace(' ', '', $dni));

        if (strlen($dni) !== 9) {
            return false;
        }

        if (!preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
            return false;
        }

        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $numero = substr($dni, 0, 8);
        $letra = substr($dni, -1);

        return $letra === $letras[$numero % 23];
    }

    /**
     * Validate Spanish NIE.
     *
     * @param string $nie
     * @return bool
     */
    public static function isValidNie($nie)
    {
        $nie = strtoupper(str_replace(' ', '', $nie));

        if (strlen($nie) !== 9) {
            return false;
        }

        if (!preg_match('/^[XYZ][0-9]{7}[A-Z]$/', $nie)) {
            return false;
        }

        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $numero = str_replace(['X', 'Y', 'Z'], ['0', '1', '2'], substr($nie, 0, 1)) . substr($nie, 1, 7);
        $letra = substr($nie, -1);

        return $letra === $letras[$numero % 23];
    }

    /**
     * Validate Spanish CIF.
     *
     * @param string $cif
     * @return bool
     */
    public static function isValidCif($cif)
    {
        $cif = strtoupper(str_replace(' ', '', $cif));

        if (strlen($cif) !== 9) {
            return false;
        }

        if (!preg_match('/^[ABCDEFGHJKLMNPQRSUVW][0-9]{7}[0-9A-J]$/', $cif)) {
            return false;
        }

        // Additional CIF validation logic can be added here if needed
        return true;
    }
}
