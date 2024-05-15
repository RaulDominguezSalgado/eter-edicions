<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Dni implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $dni = substr($value, 0, 8);
        $letter = substr($value, 8, 1);
        $letters = 'TRWAGMYFPDXBNJZSQVHLCKE';
        $index = (int)$dni % 23;
        $correctLetter = $letters[$index];

        return strtoupper($letter) === $correctLetter;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is invalid.';
    }
}
