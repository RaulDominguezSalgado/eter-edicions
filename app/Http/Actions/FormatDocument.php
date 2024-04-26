<?php

namespace App\Http\Actions;

/**
 * Class AuthorController
 * @package App\Http\Controllers
 */
class FormatDocument {
    public static function slugify($text) {
        // Reemplazar caracteres especiales por un guion
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // Convertir el texto a minúsculas
        $text = strtolower($text);

        // Reemplazar caracteres especiales por su equivalente sin diacríticos
        $text = str_replace(
            ['á', 'é', 'í', 'ó', 'ú', 'ü', 'ñ', 'ç'],
            ['a', 'e', 'i', 'o', 'u', 'u', 'n', 'c'],
            $text
        );

        // Eliminar caracteres no deseados
        $text = preg_replace('~[^-\w]+~', '', $text);

        // Si quedan varios guiones juntos, reemplazarlos por uno solo
        $text = preg_replace('~-+~', '-', $text);

        // Eliminar guiones al principio y al final
        $text = trim($text, '-');

        return $text;
    }
}