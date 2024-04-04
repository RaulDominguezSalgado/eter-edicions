<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @property $id
 * @property $title
 * @property $author_id
 * @property $translator_id
 * @property $description
 * @property $date
 * @property $image
 * @property $content
 * @property $publication_date
 * @property $published_by
 * @property $created_at
 * @property $updated_at
 *
 * @property Author $author
 * @property User $user
 * @property Translator $translator
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Post extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'author_id', 'translator_id', 'description', 'date', 'image', 'content', 'publication_date', 'published_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(\App\Models\Author::class, 'author_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'published_by', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function translator()
    {
        return $this->belongsTo(\App\Models\Translator::class, 'translator_id', 'id');
    }
    

}
