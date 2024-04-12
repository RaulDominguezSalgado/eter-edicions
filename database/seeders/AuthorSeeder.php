<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Collaborator;
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
        $majdkayyal->collaborator_id = Collaborator::find(1)->id;
        $majdkayyal->save();

        //Rasha Omran
        $rashaomran = new Author();
        $rashaomran->collaborator_id = Collaborator::find(6)->id;
        $rashaomran->save();

        //Elisabeth Hultcrantz
        $elisabethhultcrantz = new Author();
        $elisabethhultcrantz->collaborator_id = Collaborator::find(9)->id;
        $elisabethhultcrantz->save();

        //Sàdiq Jalal al-Àzem
        $sadiqjalalalazem = new Author();
        $sadiqjalalalazem->collaborator_id = Collaborator::find(10)->id;
        $sadiqjalalalazem->save();

        //Sélim Nassib
        $selimnassib = new Author();
        $selimnassib->collaborator_id = Collaborator::find(11)->id;
        $selimnassib->save();

        //Asmaa Alghoul
        $asmaalghoul = new Author();
        $asmaalghoul->collaborator_id = Collaborator::find(12)->id;
        $asmaalghoul->save();
    }
}
