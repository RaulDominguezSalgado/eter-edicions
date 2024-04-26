<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdersDetail
 *
 * @property $id
 * @property $order_id
 * @property $product_id
 * @property $quantity
 * @property $price_each
 * @property $created_at
 * @property $updated_at
 *
 * @property Order $order
 * @property Book $book
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrdersDetail extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price_each'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(\App\Models\Book::class, 'product_id', 'id');
    }


}
