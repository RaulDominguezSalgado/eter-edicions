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
        $etcetera->website = "https://www.llibreriaetcetera.com/cat/index.php";
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

        $lesvoltes = new Bookstore();
        $lesvoltes->name = "Les Voltes";
        $lesvoltes->address = "Plaça del Vi, 2";
        $lesvoltes->city = "Girona";
        $lesvoltes->province = "Girona";
        $lesvoltes->website = "https://www.llibrerialesvoltes.cat/cat/";
        $lesvoltes->save();

        $argonauta = new Bookstore();
        $argonauta->name = "L'Argonauta";
        $argonauta->address = "Barcelona, 28";
        $argonauta->city = "Balaguer";
        $argonauta->province = "Lleida";
        $argonauta->website = "https://www.largonauta.cat/";
        $argonauta->save();

        $refugi = new Bookstore();
        $refugi->name = "El Refugi";
        $refugi->address = "Canonges, 9";
        $refugi->city = "La Seu d'Urgell";
        $refugi->province = "Lleida";
        $refugi->website = "https://elrefugi.cat/";
        $refugi->save();

        $capona = new Bookstore();
        $capona->name = "La Capona";
        $capona->address = "Gasòmetre, 41";
        $capona->city = "Tarragona";
        $capona->province = "Tarragona";
        $capona->website = "https://www.lacapona.coop/";
        $capona->save();

        $adsera = new Bookstore();
        $adsera->name = "Adserà";
        $adsera->address = "Rambla Nova, 94";
        $adsera->city = "Tarragona";
        $adsera->province = "Tarragona";
        $adsera->website = "https://www.adsera.com/";
        $adsera->save();

        $paperdarros = new Bookstore();
        $paperdarros->name = "Paper d'arròs, llibres";
        $paperdarros->address = "Ronda del Borx, 72";
        $paperdarros->city = "Sueca";
        $paperdarros->province = "País Valencià";
        $paperdarros->website = "https://www.facebook.com/paperdarros/";
        $paperdarros->save();

        $fanset = new Bookstore();
        $fanset->name = "Fan set";
        $fanset->address = "Sant Ferran, 12";
        $fanset->city = "València";
        $fanset->province = "País Valencià";
        $fanset->website = "https://www.facebook.com/llibreriafanset/";
        $fanset->save();
    }
}
