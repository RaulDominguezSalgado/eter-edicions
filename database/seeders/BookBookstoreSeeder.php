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
        $tragedia = Book::find(1);
        $tragedia->bookstores()->attach(1);

        $panorama = Book::find(2);

        $nenssuecs = Book::find(3);

        $orientalisme = Book::find(4);
    }
}
