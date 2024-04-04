<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 *
 * @property $id
 * @property $isbn
 * @property $publisher
 * @property $image
 * @property $pvp
 * @property $iva
 * @property $discounted_price
 * @property $stock
 * @property $visible
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Book extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['isbn', 'publisher', 'image', 'pvp', 'iva', 'discounted_price', 'stock', 'visible'];



}
