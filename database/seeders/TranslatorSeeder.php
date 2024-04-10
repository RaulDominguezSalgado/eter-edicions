<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use App\Models\Translator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranslatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Mohammad bitari
        $mohammadbitari = new Translator();
        $mohammadbitari->collaborator_id = Collaborator::find(2)->id;
        $mohammadbitari->save();

        //Ismael Profitós
        $ismaelprofitos = new Translator();
        $ismaelprofitos->collaborator_id = Collaborator::find(3)->id;
        $ismaelprofitos->save();

        //Margarida Castells
        $margaridacastells = new Translator();
        $margaridacastells->collaborator_id = Collaborator::find(4)->id;
        $margaridacastells->save();
    }
}
