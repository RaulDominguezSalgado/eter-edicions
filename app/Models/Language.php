<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 *
 * @property $iso
 *
 * @property Language $language
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Language extends Model
{
    use HasFactory;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['iso'];

    public function translations(){
        return $this->hasMany(\App\Models\LanguageTranslation::class);
    }

    public function books(){
        return $this->belongsToMany(\App\Models\Book::class, 'book_language', 'lang_iso', 'book_id', 'iso', 'id');
    }
}
