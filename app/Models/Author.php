<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 *
 * @property $id
 * @property $represented_by_agency
 * @property $created_at
 * @property $updated_at
 *
 * @property Collaborator $collaborator
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Author extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['represented_by_agency'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collaborator()
    {
        return $this->belongsTo(\App\Models\Collaborator::class, 'id', 'id');
    }
    

}
