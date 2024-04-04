<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Illustrator
 *
 * @property $id
 *
 * @property Collaborator $collaborator
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Illustrator extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collaborator()
    {
        return $this->belongsTo(\App\Models\Collaborator::class, 'id', 'id');
    }
    

}
