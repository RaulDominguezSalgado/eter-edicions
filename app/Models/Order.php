<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'total',
        'dni',
        'first_name',
        'last_name',
        'email',
        "phone_number",
        "address",
        "zip_code",
        "city",
        "country",
        'payment_method',
        'status',
        'pdf',
        'tracking_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(){
        return $this->belongsTo(\App\Models\OrderStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function details(){
        return $this->hasMany(\App\Models\OrderDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusHistory(){
        return $this->hasMany(\App\Models\OrderStatusHistory::class);;
    }
}
