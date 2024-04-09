<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $tragedia->publisher = "Èter Edicions";
        $tragedia->image = "la-tragedia-den-saied-mattar.webp";
        $tragedia->pvp = 20.80;
        $tragedia->iva = 4;
        $tragedia->discounted_price;
        $tragedia->stock = 400;
        $tragedia->visible = 1;
        $tragedia->save();

        $tragedia->authors->attach(1);
        $tragedia->translators->attach(2);
        $tragedia->translators->attach(3);
        $tragedia->illustrators->attach(4);

        // Panorama

    }
}
