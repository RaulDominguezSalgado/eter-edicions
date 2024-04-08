<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Collaborator;
use \App\Models\CollaboratorsTranslation;

class ColaboratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collaborator::create([
            'id' => 1,
            'image' => 'collab-1.webp',
            'social_networks' => json_encode(['twitter' => '@usuario1', 'facebook' => 'usuario1']),
        ]);

        Collaborator::create([
            'id' => 2,
            'image' => 'collab-2.webp',
            'social_networks' => json_encode(['instagram' => 'usuario2', 'linkedin' => 'usuario2']),
        ]);

        Collaborator::create([
            'id' => 3,
            'image' => 'collab-3.webp',
            'social_networks' => json_encode(['twitter' => '@usuario3', 'linkedin' => 'usuario3']),
        ]);
        CollaboratorsTranslation::create([
            'collaborator_id' => 1,
            'lang' => 'en',
            'name' => 'John',
            'last_name' => 'Smith',
            'biography' => 'John Smith is an accomplished author known for his bestselling novels in the thriller genre. His writing style is characterized by gripping plots and well-developed characters. With numerous awards to his name, John continues to captivate readers with each new release.',
            'slug' =>'John Smith'
        ]);
        CollaboratorsTranslation::create([
            'collaborator_id' => 1,
            'lang' => 'es',
            'name' => 'John',
            'last_name' => 'Smith',
            'biography' => 'John Smith es un autor consumado conocido por sus exitosas novelas en el género del thriller. Su estilo de escritura se caracteriza por tramas emocionantes y personajes bien desarrollados. Con numerosos premios a su nombre, John sigue cautivando a los lectores con cada nuevo lanzamiento.',
            'slug' =>'John Smith'
        ]);
        CollaboratorsTranslation::create([
            'collaborator_id' => 2,
            'lang' => 'es',
            'name' => 'Maria',
            'last_name' => 'Garcia',
            'biography' => 'María García es una autora reconocida por sus novelas románticas que han conquistado los corazones de los lectores. Su habilidad para crear historias emotivas y personajes entrañables la ha convertido en una de las escritoras más queridas en su género.',
            'slug'=>"Maria Garcia"
        ]);

        CollaboratorsTranslation::create([
            'collaborator_id' => 3,
            'lang' => 'en',
            'name' => 'Emily',
            'last_name' => 'Johnson',
            'biography' => 'Emily Johnson is a talented illustrator known for her whimsical artwork and vibrant illustrations. Her illustrations have graced the pages of numerous children\'s books and have delighted readers of all ages.',
            "slug" => "Emily Johnson"
        ]);

        CollaboratorsTranslation::create([
            'collaborator_id' => 3,
            'lang' => 'ca',
            'name' => 'Emily',
            'last_name' => 'Johnson',
            'biography' => 'Emily Johnson és una il·lustradora talentosa coneguda pel seu treball capritxós i les seves il·lustracions vibrants. Les seves il·lustracions han decorat les pàgines de nombrosos llibres infantils i han encantat lectors de totes les edats.',
            "slug" => "Emily Johnson"
        ]);

        CollaboratorsTranslation::create([
            'collaborator_id' => 3,
            'lang' => 'es',
            'name' => 'Emily',
            'last_name' => 'Johnson',
            'biography' => 'Emily Johnson es una talentosa ilustradora conocida por su trabajo caprichoso y sus ilustraciones vibrantes. Sus ilustraciones han decorado las páginas de numerosos libros infantiles y han encantado a lectores de todas las edades.',
            "slug" => "Emily Johnson"
        ]);

        CollaboratorsTranslation::create([
            'collaborator_id' => 3,
            'lang' => 'ar',
            'name' => 'إيميلي',
            'last_name' => 'جونسون',
            'biography' => 'إيميلي جونسون هي رسامة موهوبة معروفة بأعمالها الفنية الغريبة والرسومات الزاهية. رسوماتها زينت صفحات العديد من كتب الأطفال وسرت بالقلوب لقراء جميع الأعمار',
            "slug" => "Emily Johnson"
        ]);
    }
}
