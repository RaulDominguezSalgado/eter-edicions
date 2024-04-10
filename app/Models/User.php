<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $last_name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $phone
 * @property $role_id
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Role $role
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'email', 'phone', 'role_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id', 'id'); //revisar relació
    }


}
