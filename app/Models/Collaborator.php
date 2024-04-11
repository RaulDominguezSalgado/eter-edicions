<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Collaborator
 *
 * @property $id
 * @property $image
 * @property $social_networks
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Collaborator extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['image', 'social_networks'];

    public function translations(){
        return $this->hasMany(\App\Models\CollaboratorTranslation::class, 'collaborator_id', 'id');
    }

    public function author(){
        return $this->hasOne(\App\Models\Author::class);
    }

    public function translator(){
        return $this->hasOne(\App\Models\Translator::class);
    }
}
