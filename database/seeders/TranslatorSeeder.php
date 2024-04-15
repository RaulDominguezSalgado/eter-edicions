<?php

namespace Database\Seeders;

use App\Models\CollaboratorTranslation;
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
        $mohammadbitari->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Bitari')->get()->first()->id;
        $mohammadbitari->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Bitari')->get()->first()->id;
        $mohammadbitari->save();

        //Ismael Profitós
        $ismaelprofitos = new Translator();
        $ismaelprofitos->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Profitós')->get()->first()->id;
        $ismaelprofitos->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Profitós')->get()->first()->id;
        $ismaelprofitos->save();

        //Margarida Castells
        $margaridacastells = new Translator();
        $margaridacastells->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Castells')->get()->first()->id;
        $margaridacastells->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Castells')->get()->first()->id;
        $margaridacastells->save();

        //Pontus Sánchez
        $pontussanchez = new Translator();
        $pontussanchez->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Sánchez')->get()->first()->id;
        $pontussanchez->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Sánchez')->get()->first()->id;
        $pontussanchez->save();

        //Oriol Rissech
        $oriolrissech = new Translator();
        $oriolrissech->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Rissech')->get()->first()->id;
        $oriolrissech->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Rissech')->get()->first()->id;
        $oriolrissech->save();
    }
}
