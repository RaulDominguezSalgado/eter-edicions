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
         //Català
         $ca = new Language();
         $ca->iso = "ca";
         $ca->save();

         $caTranslationCa = new LanguageTranslation();
         $caTranslationCa->iso_language = "ca";
         $caTranslationCa->iso_translation = "ca";
         $caTranslationCa->translation = "Català";
         $caTranslationCa->save();


          //Espanyol
          $es = new Language();
          $es->iso = "es";
          $es->save();

          $esTranslationEs = new LanguageTranslation();
          $esTranslationEs->iso_language = "es";
          $esTranslationEs->iso_translation = "ca";
          $esTranslationEs->translation = "Espanyol";
          $esTranslationEs->save();


          //Àrab
          $ar = new Language();
          $ar->iso = "ar";
          $ar->save();

          $arTranslationAr = new LanguageTranslation();
          $arTranslationAr->iso_language = "ar";
          $arTranslationAr->iso_translation = "ca";
          $arTranslationAr->translation = "Àrab";
          $arTranslationAr->save();


          //Anglès
         $en = new Language();
         $en->iso = "en";
         $en->save();

         $enTranslationCa = new LanguageTranslation();
         $enTranslationCa->iso_language = "en";
         $enTranslationCa->iso_translation = "ca";
         $enTranslationCa->translation = "Anglès";
         $enTranslationCa->save();
    }
}
