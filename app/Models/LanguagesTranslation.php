<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 *
 * @property $iso_language
 * @property $iso_translation
 * @property $translation
 *
 * @property LanguageTranslation $languageTranslation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LanguagesTranslation extends Model
{
    use HasFactory;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['iso_language', 'iso_translation', 'translation'];
}
