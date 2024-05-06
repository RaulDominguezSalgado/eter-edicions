<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\CollectionTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Poesia
        $poesia = new Collection();
        $poesia->save();

        $poesiaTranslationCa = new CollectionTranslation();
        $poesiaTranslationCa->collection_id = $poesia->id;
        $poesiaTranslationCa->lang = "ca";
        $poesiaTranslationCa->name = "Poesia";
        $poesiaTranslationCa->description = "Llibres de poesia d'Èter Edicions.";
        $poesiaTranslationCa->slug = "poesia";
        $poesiaTranslationCa->meta_title = $poesiaTranslationCa->name;
        $poesiaTranslationCa->meta_description = $poesiaTranslationCa->description;
        $poesiaTranslationCa->save();

        $poesiaTranslationEs = new CollectionTranslation();
        $poesiaTranslationEs->collection_id = $poesia->id;
        $poesiaTranslationEs->lang = "es";
        $poesiaTranslationEs->name = "Poesía";
        $poesiaTranslationEs->description = "Libros de poesía de Èter Edicions.";
        $poesiaTranslationEs->slug = "poesia";
        $poesiaTranslationEs->meta_title = $poesiaTranslationEs->name;
        $poesiaTranslationEs->meta_description = $poesiaTranslationEs->description;
        $poesiaTranslationEs->save();


        // Novel·la
        $novella = new Collection();
        $novella->save();

        $novellaTranslationCa = new CollectionTranslation();
        $novellaTranslationCa->collection_id = $novella->id;
        $novellaTranslationCa->lang = "ca";
        $novellaTranslationCa->name = "Ficció";
        $novellaTranslationCa->description = "Totes les novel·les d'Èter Edicions.";
        $novellaTranslationCa->slug = "ficcio";
        $novellaTranslationCa->meta_title = $novellaTranslationCa->name;
        $novellaTranslationCa->meta_description = $novellaTranslationCa->description;
        $novellaTranslationCa->save();

        $novellaTranslationEs = new CollectionTranslation();
        $novellaTranslationEs->collection_id = $novella->id;
        $novellaTranslationEs->lang = "es";
        $novellaTranslationEs->name = "Ficción";
        $novellaTranslationEs->description = "Todas las novelas de Èter Edicions.";
        $novellaTranslationEs->slug = "ficcion";
        $novellaTranslationEs->meta_title = $novellaTranslationEs->name;
        $novellaTranslationEs->meta_description = $novellaTranslationEs->description;
        $novellaTranslationEs->save();


        // Teatre
        $teatre = new Collection();
        $teatre->save();

        $teatreTranslationCa = new CollectionTranslation();
        $teatreTranslationCa->collection_id = $teatre->id;
        $teatreTranslationCa->lang = "ca";
        $teatreTranslationCa->name = "Teatre";
        $teatreTranslationCa->description = "Textos d'obres de teatre editats per Èter Edicions.";
        $teatreTranslationCa->slug = "teatre";
        $teatreTranslationCa->meta_title = $teatreTranslationCa->name;
        $teatreTranslationCa->meta_description = $teatreTranslationCa->description;
        $teatreTranslationCa->save();

        $teatreTranslationEs = new CollectionTranslation();
        $teatreTranslationEs->collection_id = $teatre->id;
        $teatreTranslationEs->lang = "es";
        $teatreTranslationEs->name = "Teatro";
        $teatreTranslationEs->description = "Textos de obras de teatro editadas por Èter Edicions.";
        $teatreTranslationEs->slug = "teatro";
        $teatreTranslationEs->meta_title = $teatreTranslationEs->name;
        $teatreTranslationEs->meta_description = $teatreTranslationEs->description;
        $teatreTranslationEs->save();


        // Assaig
        $assaig = new Collection();
        $assaig->save();

        $assaigTranslationCa = new CollectionTranslation();
        $assaigTranslationCa->collection_id = $assaig->id;
        $assaigTranslationCa->lang = "ca";
        $assaigTranslationCa->name = "Assaig";
        $assaigTranslationCa->description = "Assajos divulgatius editats per Èter Edicions.";
        $assaigTranslationCa->slug = "assaig";
        $assaigTranslationCa->meta_title = $assaigTranslationCa->name;
        $assaigTranslationCa->meta_description = $assaigTranslationCa->description;
        $assaigTranslationCa->save();

        $assaigTranslationEs = new CollectionTranslation();
        $assaigTranslationEs->collection_id = $assaig->id;
        $assaigTranslationEs->lang = "es";
        $assaigTranslationEs->name = "Ensayo";
        $assaigTranslationEs->description = "Ensayos divulgativos editados por Èter Edicions.";
        $assaigTranslationEs->slug = "ensayo";
        $assaigTranslationEs->meta_title = $assaigTranslationEs->name;
        $assaigTranslationEs->meta_description = $assaigTranslationEs->description;
        $assaigTranslationEs->save();



        // Pensament
        $pensament = new Collection();
        $pensament->save();

        $pensamentTranslationCa = new CollectionTranslation();
        $pensamentTranslationCa->collection_id = $pensament->id;
        $pensamentTranslationCa->lang = "ca";
        $pensamentTranslationCa->name = "Pensament";
        $pensamentTranslationCa->description = "Textos per pensar editats per Èter Edicions. Filosofia, decolonialisme...";
        $pensamentTranslationCa->slug = "pensament";
        $pensamentTranslationCa->meta_title = $pensamentTranslationCa->name;
        $pensamentTranslationCa->meta_description = $pensamentTranslationCa->description;
        $pensamentTranslationCa->save();

        $pensamentTranslationEs = new CollectionTranslation();
        $pensamentTranslationEs->collection_id = $pensament->id;
        $pensamentTranslationEs->lang = "es";
        $pensamentTranslationEs->name = "Pensamiento";
        $pensamentTranslationEs->description = "Textos para pensar editados por Èter Edicions. Filosofía, decolonialismo...";
        $pensamentTranslationEs->slug = "pensamiento";
        $pensamentTranslationEs->meta_title = $pensamentTranslationEs->name;
        $pensamentTranslationEs->meta_description = $pensamentTranslationEs->description;
        $pensamentTranslationEs->save();
    }
}
