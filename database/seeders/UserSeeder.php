<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oriol = new User();
        $oriol->email = "orissech@eteredicions.com";
        $oriol->email_verified_at = now();
        $oriol->first_name = "Oriol";
        $oriol->last_name = "Rissech Gasulla";
        $oriol->password = "PerOsirisIPerApis!";
        $oriol->phone = "637059090";
        $oriol->role_id = 1;
        $oriol->save();

        $moha = new User();
        $moha->email = "mbitari@eteredicions.com";
        $moha->email_verified_at = now();
        $moha->first_name = "Mohammad";
        $moha->last_name = "Bitari";
        $moha->password = "LaContraDelMoha";
        $moha->phone = "600113218";
        $moha->role_id = 1;
        $moha->save();
    }
}
