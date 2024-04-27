<?php

namespace App\Models;

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
class Book extends Model
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
}
