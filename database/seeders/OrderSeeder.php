<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusNames = [
            "Pagat, pendent d'enviament"=>"#1db40d",
            "Cancel·lat"=>"#ff0000",
            "Retornat"=>"#41007d",
            "Enviat"=>"#0b8b4e",
            "Rebut"=>"#8a2be2",
            "Pagament pendent"=>"#4e80ff",
        ];
        foreach ($statusNames as $name => $color) {
            OrderStatus::create([
                'name' => $name,
                'color' => $color,
            ]);
        }
    }
}
