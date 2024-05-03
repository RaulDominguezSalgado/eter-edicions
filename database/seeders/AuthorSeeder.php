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
        $majdkayyal->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Kayyal')->get()->first()->collaborator_id;
        $majdkayyal->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Kayyal')->get()->first()->collaborator_id;
        $majdkayyal->save();

        //Rasha Omran
        $rashaomran = new Author();
        $rashaomran->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Omran')->get()->first()->collaborator_id;
        $rashaomran->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Omran')->get()->first()->collaborator_id;
        $rashaomran->save();

        //Elisabeth Hultcrantz
        $elisabethhultcrantz = new Author();
        $elisabethhultcrantz->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Hultcrantz')->get()->first()->collaborator_id;
        $elisabethhultcrantz->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Hultcrantz')->get()->first()->collaborator_id;
        $elisabethhultcrantz->save();

        //Sàdiq Jalal al-Àzem
        $sadiqjalalalazem = new Author();
        $sadiqjalalalazem->id = CollaboratorTranslation::where('last_name', 'LIKE', 'al-Àzem')->get()->first()->collaborator_id;
        $sadiqjalalalazem->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'al-Àzem')->get()->first()->collaborator_id;
        $sadiqjalalalazem->save();

        //Sélim Nassib
        $selimnassib = new Author();
        $selimnassib->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Nassib')->get()->first()->collaborator_id;
        $selimnassib->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Nassib')->get()->first()->collaborator_id;
        $selimnassib->save();

        //Asmaa Alghoul
        $asmaalghoul = new Author();
        $asmaalghoul->id = CollaboratorTranslation::where('last_name', 'LIKE', 'Alghoul')->get()->first()->collaborator_id;
        $asmaalghoul->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', 'Alghoul')->get()->first()->collaborator_id;
        $asmaalghoul->save();


        //Oriol Rissech
        $oriolrissech = new Author();
        $oriolrissech->id = CollaboratorTranslation::where('last_name', 'LIKE', '%Rissech%')->get()->first()->collaborator_id;
        $oriolrissech->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', '%Rissech%')->get()->first()->collaborator_id;
        $oriolrissech->represented_by_agency = 1;
        $oriolrissech->save();


        //Mohammad Bitari
        $mohammadbitari = new Author();
        $mohammadbitari->id = CollaboratorTranslation::where('last_name', 'LIKE', '%Bitari%')->get()->first()->collaborator_id;
        $mohammadbitari->collaborator_id = CollaboratorTranslation::where('last_name', 'LIKE', '%Bitari%')->get()->first()->collaborator_id;
        $mohammadbitari->represented_by_agency = 1;
        $mohammadbitari->save();
    }
}
