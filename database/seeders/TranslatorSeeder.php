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
        $mohammadbitari->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Bitari')->get()->first()->collaborator_id;
        $mohammadbitari->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Bitari')->get()->first()->collaborator_id;
        $mohammadbitari->save();

        //Ismael Profitós
        $ismaelprofitos = new Translator();
        $ismaelprofitos->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Profitós')->get()->first()->collaborator_id;
        $ismaelprofitos->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Profitós')->get()->first()->collaborator_id;
        $ismaelprofitos->save();

        //Margarida Castells
        $margaridacastells = new Translator();
        $margaridacastells->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Castells')->get()->first()->collaborator_id;
        $margaridacastells->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Castells')->get()->first()->collaborator_id;
        $margaridacastells->save();

        //Pontus Sánchez
        $pontussanchez = new Translator();
        $pontussanchez->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Sánchez')->get()->first()->collaborator_id;
        $pontussanchez->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Sánchez')->get()->first()->collaborator_id;
        $pontussanchez->save();

        //Oriol Rissech
        $oriolrissech = new Translator();
        $oriolrissech->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Rissech')->get()->first()->collaborator_id;
        $oriolrissech->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Rissech')->get()->first()->collaborator_id;
        $oriolrissech->save();
    }
}
