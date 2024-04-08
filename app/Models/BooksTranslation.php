<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BooksTranslation extends Model
{
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['book_id', 'lang', 'title', 'description', 'slug'];

    public function collaborator()
    {
        return $this->belongsTo(\App\Models\Book::class, 'book_id', 'id');
    }
}
