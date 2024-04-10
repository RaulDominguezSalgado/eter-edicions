<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionTranslation extends Model
{
    use HasFactory;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['collection_id', 'lang', 'name', 'description', 'slug'];


    public function collection(){
        return $this->belongsTo(\App\Models\Collection::class);
    }
}
