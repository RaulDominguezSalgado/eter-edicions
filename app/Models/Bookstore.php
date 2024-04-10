<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bookstore
 *
 * @property $id
 * @property $name
 * @property $address
 * @property $website
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bookstore extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address', 'website'];


    public function books(){
        return $this->belongsToMany(\App\Models\Book::class);
    }
}
