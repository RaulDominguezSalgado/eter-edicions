<?php

namespace App\Services\Translation;

class OrthographicRules
{
    // Function to check if a word starts with "de" followed by a vowel or "h" followed by a vowel
    public static function startsWithDe($word)
    {
        return preg_match('/\bde\s+(?:[aeiouàáâãäåæçèéêëìíîïðòóôõöøùúûü]|h[aeiouàáâãäåæçèéêëìíîïðòóôõöøùúûü])/i', strtolower($word));
    }

    // Function to format preposition "de"
    public static function formatDe($word){
        return preg_match('/\bde\s+(?:[aeiouàáâãäåæçèéêëìíîïðòóôõöøùúûü]|h[aeiouàáâãäåæçèéêëìíîïðòóôõöøùúûü])/i', strtolower($word)) ? "de" : "d'";
    }
}
