<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use App\Models\Illustrator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IllustratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Rammi Abbas
        $rammiabbas = new Illustrator();
        $rammiabbas->id = Collaborator::find(5)->id;
        $rammiabbas->save();
    }
}
