<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Role extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->hasMany(\App\Models\User::class, 'user_id', 'id');
    }
}
