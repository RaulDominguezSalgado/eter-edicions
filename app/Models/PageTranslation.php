<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CollaboratorsTranslation
 *
 * @property $id
 * @property $page_id
 * @property $lang
 * @property $slug
 * @property $meta_title
 * @property $meta_description
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PageTranslation extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_id',
        'lang',
        'slug',
        'meta_title', // label form creació / edició: "Títol de la pàgina"
        'meta_description', // label form creació / edició: "Descripció breu de la pàgina"
        'biography'
    ];

    public function language()
    {
        return $this->belongsTo(\App\Models\Language::class);
    }
}
