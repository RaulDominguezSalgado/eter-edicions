<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @property $id
 * @property $order_id
 * @property $dni
 * @property $name
 * @property $last_name
 * @property $email
 * @property $phone_number
 * @property $address
 * @property $zip_code
 * @property $city
 * @property $country
 * @property $created_at
 * @property $updated_at
 *
 * @property Order $order
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Client extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'dni', 'name', 'last_name', 'email', 'phone_number', 'address', 'zip_code', 'city', 'country'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }
    

}
