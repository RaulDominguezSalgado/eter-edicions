<?php

namespace Database\Seeders;

use \App\Models\Book;
use \App\Models\Bookstore;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookBookstoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Books
        $tragedia = Book::find(1);
        $panorama = Book::find(2);
        $nenssuecs = Book::find(3);
        $orientalisme = Book::find(4);

        //Bookstores
        $llibreriaona = Bookstore::where('name', 'LIKE', 'Llibreria Ona')->first();
        $etcetera = Bookstore::where('name', 'LIKE', 'Etcètera')->first();
        $laimpossible = Bookstore::where('name', 'LIKE', 'La impossible')->first();
        $altair = Bookstore::where('name', 'LIKE', 'Altaïr')->first();

        $llibreriaona->books()->attach([
            $tragedia->id => ['stock' => 15],
            $panorama->id => ['stock' => 12],
            $nenssuecs->id => ['stock' => 21],
            $orientalisme->id => ['stock' => 6]
        ]);

        $etcetera->books()->attach([
            $tragedia->id => ['stock' => 9],
            $panorama->id => ['stock' => 4],
            $nenssuecs->id => ['stock' => 1]
        ]);

        $laimpossible->books()->attach([
            $tragedia->id => ['stock' => 10],
            $panorama->id => ['stock' => 18],
            $nenssuecs->id => ['stock' => 11],
            $orientalisme->id => ['stock' => 4]
        ]);

        $altair->books()->attach([
            $tragedia->id => ['stock' => 5],
            $panorama->id => ['stock' => 9],
            $nenssuecs->id => ['stock' => 7],
            $orientalisme->id => ['stock' => 16]
        ]);
    }
}
