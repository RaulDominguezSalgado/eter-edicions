<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdersStatusHistory
 *
 * @property $id
 * @property $order_id
 * @property $status_id
 * @property $timestamp
 * @property $created_at
 * @property $updated_at
 *
 * @property Order $order
 * @property OrdersStatus $ordersStatus
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrdersStatusHistory extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'status_id', 'timestamp'];


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
    public function ordersStatus()
    {
        return $this->belongsTo(\App\Models\OrdersStatus::class, 'status_id', 'id');
    }


}
