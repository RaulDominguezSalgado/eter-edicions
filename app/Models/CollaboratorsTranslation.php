<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CollaboratorsTranslation
 *
 * @property $id
 * @property $collaborator_id
 * @property $lang
 * @property $name
 * @property $last_name
 * @property $biography
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CollaboratorsTranslation extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['collaborator_id', 'lang', 'name', 'last_name', 'biography'];

    public function collaborator()
    {
        return $this->belongsTo(\App\Models\Collaborator::class, 'collaborator_id', 'id');
    }
}
