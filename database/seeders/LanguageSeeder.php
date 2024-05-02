<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\LanguageTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Catalan
        $ca = new Language();
        $ca->iso = "ca";
        $ca->save();

        //Spanish
        $es = new Language();
        $es->iso = "es";
        $es->save();

        //Arabic
        $arb = new Language();
        $arb->iso = "arb";
        $arb->save();

        //English
        $en = new Language();
        $en->iso = "en";
        $en->save();


        //TRANSLATIONS

        //Catalan
        $caTranslationCa = new LanguageTranslation();
        $caTranslationCa->iso_language = "ca";
        $caTranslationCa->iso_translation = "ca";
        $caTranslationCa->translation = "Català";
        $caTranslationCa->save();

        $caTranslationEs = new LanguageTranslation();
        $caTranslationEs->iso_language = "ca";
        $caTranslationEs->iso_translation = "es";
        $caTranslationEs->translation = "Catalán";
        $caTranslationEs->save();


        //Spanish
        $esTranslationCa = new LanguageTranslation();
        $esTranslationCa->iso_language = "es";
        $esTranslationCa->iso_translation = "ca";
        $esTranslationCa->translation = "Espanyol";
        $esTranslationCa->save();

        $esTranslationEs = new LanguageTranslation();
        $esTranslationEs->iso_language = "es";
        $esTranslationEs->iso_translation = "es";
        $esTranslationEs->translation = "Español";
        $esTranslationEs->save();


        //Arabic
        $arbTranslationCa = new LanguageTranslation();
        $arbTranslationCa->iso_language = "arb";
        $arbTranslationCa->iso_translation = "ca";
        $arbTranslationCa->translation = "Àrab";
        $arbTranslationCa->save();

        $arbTranslationEs = new LanguageTranslation();
        $arbTranslationEs->iso_language = "arb";
        $arbTranslationEs->iso_translation = "es";
        $arbTranslationEs->translation = "Árabe";
        $arbTranslationEs->save();


        //English
        $enTranslationCa = new LanguageTranslation();
        $enTranslationCa->iso_language = "en";
        $enTranslationCa->iso_translation = "ca";
        $enTranslationCa->translation = "Anglès";
        $enTranslationCa->save();

        $enTranslationEs = new LanguageTranslation();
        $enTranslationEs->iso_language = "en";
        $enTranslationEs->iso_translation = "es";
        $enTranslationEs->translation = "Inglés";
        $enTranslationEs->save();
    }
}
