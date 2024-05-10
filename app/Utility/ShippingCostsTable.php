<?php

namespace App\Utility;

/**
 * Class CountriesAndProvinces
 * @package App\Utility;
 */
class ShippingCostsTable
{

    private $shippingCostsSpanishProvinces = [
        // provincial
        "B" => [
            "standard" => ["name" => "standard", "price" => 3.95],
            "premium" => ["name" => "premium", "price" => 4.95]
        ],

        // regional
        "GI" => [
            "standard" => ["name" => "standard", "price" => 4.50],
            "premium" => ["name" => "premium", "price" => 6.00]
        ],
        "L" => [
            "standard" => ["name" => "standard", "price" => 4.50],
            "premium" => ["name" => "premium", "price" => 6.00]
        ],
        "T" => [
            "standard" => ["name" => "standard", "price" => 4.50],
            "premium" => ["name" => "premium", "price" => 6.00]
        ],

        // peninsular
        "ES" => [
            "standard" => ["name" => "standard", "price" => 4.95],
            "premium" => ["name" => "premium", "price" => 7.50]
        ],

        // balears
        "PM" => ["standard" => ["name" => "standard", "price" => 8.50]],

        // ceuta i melilla
        "CE" => ["standard" => ["name" => "standard", "price" => 8.50]],
        "ML" => ["standard" => ["name" => "standard", "price" => 8.50]],

        // canàries
        "TF" => ["standard" => ["name" => "standard", "price" => 8.50]],
        "GC" => ["standard" => ["name" => "standard", "price" => 8.50]],
    ];

    private $shippingCostsInternationalCountries = [
        "default" => ["name" => "internacional-light", "price" => 14.95],
    ];

    public function shippingCostsSpanishProvinces(){
        return $this->shippingCostsSpanishProvinces;
    }

    public function shippingCostsInternationalCountries(){
        return $this->shippingCostsInternationalCountries;
    }
}
