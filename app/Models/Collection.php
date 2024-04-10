<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Collection
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Collection extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function translations(){
        return $this->hasMany(\App\Models\CollectionsTranslation::class, 'collection_id', 'id');
    }

}
