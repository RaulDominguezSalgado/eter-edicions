<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Collaborator;
use App\Models\CollaboratorTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Majd Kayyal
        $majdkayyal = new Author();
        $majdkayyal->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Kayyal')->get()->first()->id;
        $majdkayyal->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Kayyal')->get()->first()->id;
        $majdkayyal->save();

        //Rasha Omran
        $rashaomran = new Author();
        $rashaomran->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Omran')->get()->first()->id;
        $rashaomran->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Omran')->get()->first()->id;
        $rashaomran->save();

        //Elisabeth Hultcrantz
        $elisabethhultcrantz = new Author();
        $elisabethhultcrantz->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Hultcrantz')->get()->first()->id;
        $elisabethhultcrantz->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Hultcrantz')->get()->first()->id;
        $elisabethhultcrantz->save();

        //Sàdiq Jalal al-Àzem
        $sadiqjalalalazem = new Author();
        $sadiqjalalalazem->id = CollaboratorTranslation::where('last_name', 'LIKE', 'al-Àzem')->get()->first()->id;
        $sadiqjalalalazem->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'al-Àzem')->get()->first()->id;
        $sadiqjalalalazem->save();

        //Sélim Nassib
        $selimnassib = new Author();
        $selimnassib->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Nassib')->get()->first()->id;
        $selimnassib->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Nassib')->get()->first()->id;
        $selimnassib->save();

        //Asmaa Alghoul
        $asmaalghoul = new Author();
        $asmaalghoul->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Alghoul')->get()->first()->id;
        $asmaalghoul->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Alghoul')->get()->first()->id;
        $asmaalghoul->save();
    }
}
