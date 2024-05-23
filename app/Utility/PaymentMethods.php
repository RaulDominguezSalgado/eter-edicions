<?php

namespace App\Utility;

/**
 * Class CountriesAndProvinces
 * @package App\Utility;
 */
class PaymentMethods
{

    private static $payment_methods = [
        "Paypal",
        "Bank Transfer",
    ];
        
    public static function all() {
        return self::$payment_methods;
    }
}
