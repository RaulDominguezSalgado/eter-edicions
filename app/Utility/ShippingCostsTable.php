<?php

namespace App\Utility;

/**
 * Class CountriesAndProvinces
 * @package App\Utility;
 */
class CountriesAndProvinces
{

    private $shippingCostsSpanishProvinces = [
        // provincial
        "B" => ["standard" => 3.95, "premium" => 4.95],

        // regional
        "GI" => ["standard" => 4.50, "premium" => 6.00],
        "L" => ["standard" => 4.50, "premium" => 6.00],
        "T" => ["standard" => 4.50, "premium" => 6.00],

        // peninsular
        "ES" => ["standard" => 4.95, "premium" => 7.50],

        // balears
        "PM" => ["standard" => 8.50],

        // ceuta i melilla
        "CE" => ["standard" => 8.50],
        "ML" => ["standard" => 8.50],

        // canàries
        "TF" => ["standard" => 8.50],
        "GC" => ["standard" => 8.50],
    ];

    private $shippingCostsInternationalCountries = [

    ];
}
