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

        $poesiaTranslation = new CollectionTranslation();
        $poesiaTranslation->collection_id = $poesia->id;
        $poesiaTranslation->lang = "ca";
        $poesiaTranslation->name = "Poesia";
        $poesiaTranslation->description = "Llibres de poesia";
        $poesiaTranslation->slug = "poesia";
        $poesiaTranslation->meta_title = $poesiaTranslation->name;
        $poesiaTranslation->meta_description = $poesiaTranslation->description;
        $poesiaTranslation->save();


        // Novel·la
        $novella = new Collection();
        $novella->save();

        $novellaTranslation = new CollectionTranslation();
        $novellaTranslation->collection_id = $novella->id;
        $novellaTranslation->lang = "ca";
        $novellaTranslation->name = "Novel·la";
        $novellaTranslation->description = "Totes les novel·les d'Èter Edicions.";
        $novellaTranslation->slug = "novella";
        $novellaTranslation->meta_title = $novellaTranslation->name;
        $novellaTranslation->meta_description = $novellaTranslation->description;
        $novellaTranslation->save();



        // Teatre
        $teatre = new Collection();
        $teatre->save();

        $teatreTranslation = new CollectionTranslation();
        $teatreTranslation->collection_id = $teatre->id;
        $teatreTranslation->lang = "ca";
        $teatreTranslation->name = "Teatre";
        $teatreTranslation->description = "Textos d'obres de teatre editats per Èter Edicions.";
        $teatreTranslation->slug = "teatre";
        $teatreTranslation->meta_title = $teatreTranslation->name;
        $teatreTranslation->meta_description = $teatreTranslation->description;
        $teatreTranslation->save();



        // Assaig
        $assaig = new Collection();
        $assaig->save();

        $assaigTranslation = new CollectionTranslation();
        $assaigTranslation->collection_id = $assaig->id;
        $assaigTranslation->lang = "ca";
        $assaigTranslation->name = "Assaig";
        $assaigTranslation->description = "Assajos divulgatius editats per Èter Edicions.";
        $assaigTranslation->slug = "assaig";
        $assaigTranslation->meta_title = $assaigTranslation->name;
        $assaigTranslation->meta_description = $assaigTranslation->description;
        $assaigTranslation->save();



        // Pensament
        $pensament = new Collection();
        $pensament->save();

        $pensamentTranslation = new CollectionTranslation();
        $pensamentTranslation->collection_id = $pensament->id;
        $pensamentTranslation->lang = "ca";
        $pensamentTranslation->name = "Pensament";
        $pensamentTranslation->description = "Textos per pensar editats per Èter Edicions. Filosofia, decolonialisme...";
        $pensamentTranslation->slug = "pensament";
        $pensamentTranslation->meta_title = $pensamentTranslation->name;
        $pensamentTranslation->meta_description = $pensamentTranslation->description;
        $pensamentTranslation->save();
    }
}
