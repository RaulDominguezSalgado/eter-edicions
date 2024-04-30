<?php

namespace App\Models;

use CodersFree\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 *
 * @property $id
 * @property $isbn
 * @property $title
 * @property $publisher
 * @property $image
 * @property $pvp
 * @property $iva
 * @property $discounted_price
 * @property $stock
 * @property $legal_disposit
 * @property $visible
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Book extends Model implements Buyable
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'title',
        'description',
        'isbn',
        'publisher',
        'lang',
        'image',
        'pvp',
        'iva',
        'discounted_price',
        'stock',
        'visible',
        'sample',
        'number_of_pages',
        'publication_date',
        'collections',
        'collaborators',
        'original_title',
        'original_publication_date',
        'original_publisher',
        'legal_diposit',
        'headline',
        'size',
        'enviromental_footprint',
        'meta_title',
        'meta_description',
    ];


    protected $casts = [
        'publication_date' => 'datetime:dd/mm/yyyy',
        'created_at' => 'datetime:dd/mm/yyyy', // Change your format
        'updated_at' => 'datetime:dd/mm/yyyy',
    ];

    public function languages()
    {
        return $this->belongsToMany(\App\Models\Language::class, 'book_language', 'book_id', 'lang_iso', 'id', 'iso');
    }

    public function extras()
    {
        return $this->hasMany(\App\Models\BookExtra::class);
    }

    public function authors()
    {
        return $this->belongsToMany(\App\Models\Author::class);
    }

    public function translators()
    {
        return $this->belongsToMany(\App\Models\Translator::class);
    }

    public function collections()
    {
        return $this->belongsToMany(\App\Models\Collection::class);
    }

    // public function bookstores(){
    //     return $this->belongsToMany(\App\Models\Bookstore::class)->withPivot('stock');
    // }
    public function bookstores()
    {
        return $this->belongsToMany(Bookstore::class)
            ->using(BookBookstore::class)
            ->withPivot('stock');
    }

    // Métodos definidos en la interfaz Buyable
    public function getBuyableIdentifier($options = null)
    {
        return $this->id; // Devuelve el ID único del libro
    }

    public function getBuyableDescription($options = null)
    {
        return $this->title; // Devuelve la descripción del libro (puede ser el título u otra descripción)
    }

    public function getBuyablePrice($options = null)
    {

        return round((($this->discounted_price ?? $this->pvp)/ (1+$this->iva/100)),2);
       // return $this->discounted_price ? round(($this->discounted_price/ (1+$this->iva/100)),2) : round(($this->pvp / (1+$this->iva/100)),2); // Devuelve el precio del libro
    }
}
