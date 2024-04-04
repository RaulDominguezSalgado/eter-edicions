<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property $id
 * @property $date
 * @property $tracking_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property OrdersStatus $ordersStatus
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'tracking_id', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordersStatus()
    {
        return $this->belongsTo(\App\Models\OrdersStatus::class, 'status', 'id');
    }
    

}
