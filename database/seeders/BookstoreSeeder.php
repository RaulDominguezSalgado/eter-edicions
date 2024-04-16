<?php

namespace Database\Seeders;

use App\Models\Bookstore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookstoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $llibreriaona = new Bookstore();
        $llibreriaona->name = "Llibreria Ona";
        $llibreriaona->address = "Pau Claris, 94";
        $llibreriaona->city = "Barcelona";
        $llibreriaona->province = "Barcelona";
        $llibreriaona->website = "https://www.onallibres.cat/";
        $llibreriaona->save();

        $etcetera = new Bookstore();
        $etcetera->name = "Etcètera";
        $etcetera->address = "Llull, 23";
        $etcetera->city = "Barcelona";
        $etcetera->province = "Barcelona";
        $etcetera->website = "https://etc-llibres.com/";
        $etcetera->save();

        $laimpossible = new Bookstore();
        $laimpossible->name = "La impossible";
        $laimpossible->address = "Provença, 232";
        $laimpossible->city = "Barcelona";
        $laimpossible->province = "Barcelona";
        $laimpossible->website = "https://www.laimpossible.cat/";
        $laimpossible->save();

        $altair = new Bookstore();
        $altair->name = "Altaïr";
        $altair->address = "Gran Via de les Corts Catalanes, 616";
        $altair->city = "Barcelona";
        $altair->province = "Barcelona";
        $altair->website = "https://www.altair.es/cat/";
        $altair->save();
    }
}
