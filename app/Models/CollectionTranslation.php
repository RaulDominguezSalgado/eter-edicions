<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionTranslation extends Model
{
    use HasFactory;

    public function collection(){
        return $this->belongsTo(\App\Models\Collection::class);
    }
}
