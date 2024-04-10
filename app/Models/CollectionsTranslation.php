<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CollectionsTranslation
 *
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CollectionsTranslation extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lang', 'name', 'description'];

    public function collection()
    {
        return $this->belongsTo(\App\Models\Collection::class, 'collection_id', 'id');
    }

}
