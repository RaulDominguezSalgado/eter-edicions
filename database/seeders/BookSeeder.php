<?php

namespace Database\Seeders;

use App\Models\Book;
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
        //Tragèdia d'en Saied Mattar
        $tragedia = new Book();
        $tragedia->isbn = "978-84-127037-1-9";
        $tragedia->title = "La tragèdia d'en Saied Mattar";
        $tragedia->headline = <<<HEREDOC
        LA CIUTAT DE HAIFA ÉS EL DECORAT ON ES DESENVOLUPEN DIVERSES HISTÒRIES EN QUATRE TEMPS, GRAVITANT AL VOLTANT D’UN PERSONATGE: EN SAIED MATTAR.
        HEREDOC;
        $tragedia->description = <<<HEREDOC
        La tragèdia d’en Saied Mattar’, primera novel·la de l’escriptor palestí Majd Kayyal, és una poderosa al·legoria de l’alienació cultural dels palestins d’Israel.
        Des del lirisme, que frega l’espai del somni, i d’una construcció argumental que encavalca diferents personatges, Kayyal pinta, amb un llenguatge plàstic i suggestiu, la vida d’aquells que pertanyen perquè no pertanyen, mentre basteix un retrat imperdible de la Haifa contemporània.
        HEREDOC;
        $tragedia->publisher = "Èter Edicions";
        $tragedia->image = "la-tragedia-den-saied-mattar.webp";
        $tragedia->pvp = 20.80;
        $tragedia->iva = 4;
        $tragedia->discounted_price;
        $tragedia->stock = 400;
        $tragedia->visible = 1;
        $tragedia->legal_diposit = "B 8646-2023";
        $tragedia->save();

        $tragedia->authors()->attach(1);
        $tragedia->translators()->attach(2);
        $tragedia->translators()->attach(3);

        // Panorama

    }
}
