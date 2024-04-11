<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Escrit al cos',
            'description' => '<p>Louise: pèl-roja, de bellesa exuberant, casada, adúltera. Pel cos se li estén una malaltia que l’amant desconeix. L’obsessió fa que es lliurin als plaers d’una relació desenfrenada, amarada de desig i sexe, en què les pells es fonen l’una amb l’altra d’una manera que no havien experimentat mai. Fins que arriba la por i, de retruc, la distància, però no el final de l’atracció.</p><p>Escrit al cos és un dels textos que va consagrar Jeanette Winterson com una de les escriptores més singulars del nostre temps. En aquest llibre, provocador i delicat, l’autora despulla les relacions i les allibera de la moral i les convencions socials per mostrar-nos que l’amor, sigui de la naturalesa que sigui, deixa traces inesborrables de vida i passió als nostres cossos.</p>',
            'slug' => 'escrit-al-cos',
            'lang' => 'ca',
            'isbn' => '978-84-19332-60-8',
            'publisher' => 'Edicions del periscopi',
            'image' => 'book1.webp',
            'pvp' => 21.5,
            'iva' => 4,
            'discounted_price' => -1,
            'stock' => 20,
            'visible' => 1,
            'sample_url' => 'sample1.pdf',
            'page_num' => '208',
            'publication_date' => '01/3/2024',
        ]);

        Book::create([
            'title' => 'مكتوب على الجسم',
            'description' => '<p>لويز: ذات شعر أحمر، جميلة للغاية، متزوجة، زانية. وينتشر في جسده مرض لا يعلم به المحب. يقودهم الهوس إلى الانغماس في ملذات علاقة جامحة، غارقة في الرغبة والجنس، حيث تذوب جلودهم في بعضها البعض بطريقة لم يسبق لهم تجربتها من قبل. حتى يأتي الخوف، وفي المقابل المسافة، ولكن ليس نهاية الانجذاب.</p><p>المكتوب على الجسد هو أحد النصوص التي جعلت جانيت وينترسون واحدة من أكثر الكتاب تميزًا في عصرنا. في هذا الكتاب الاستفزازي والحساس، يجرد المؤلف العلاقات ويحررها من الأخلاق والأعراف الاجتماعية ليبين لنا أن الحب مهما كانت طبيعته يترك آثارًا لا تمحى من الحياة والعاطفة على أجسادنا.</p>',
            'slug' => 'maktub-ealaa-aljism',
            'lang' => 'ar',
            'isbn' => '978-84-19332-60-5',
            'publisher' => 'Edicions del periscopi',
            'image' => 'book1.webp',
            'pvp' => 21.5,
            'iva' => 4,
            'discounted_price' => -1,
            'stock' => 20,
            'sample_url' => 'sample2.pdf',
            'page_num' => '230',
            'publication_date' => '01/3/2024',
        ]);
    }
}
