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
    }
}
