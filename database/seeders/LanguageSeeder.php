<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\LanguagesTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //Català
         $ca = new Language();
         $ca->iso = "ca";
         $ca->save();

         $caTranslationCa = new LanguagesTranslation();
         $caTranslationCa->iso_language = "ca";
         $caTranslationCa->iso_translation = "ca";
         $caTranslationCa->translation = "Català";
         $caTranslationCa->save();


          //Espanyol
          $es = new Language();
          $es->iso = "es";

        //   $esTranslationEs = new LanguagesTranslation();
        //   $esTranslationEs->iso_language = "es";
        //   $esTranslationEs->iso_translation = "ca";
        //   $esTranslationEs->translation = "Espanyol";
        //   $esTranslationEs->save();


          //Àrab
          $ar = new Language();
          $ar->iso = "ar";

        //   $arTranslationAr = new LanguagesTranslation();
        //   $arTranslationAr->iso_language = "ar";
        //   $arTranslationAr->iso_translation = "ar";
        //   $arTranslationAr->translation = "Àrab";
        //   $arTranslationAr->save();
    }
}
