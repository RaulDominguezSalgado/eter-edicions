<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_translation_id',
        'key',
        'content'
    ];

    public function translation(){
        return $this->belongsTo(\App\Models\PageTranslation::class, 'page_translation_id');
    }
}
