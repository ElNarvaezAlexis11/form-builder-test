<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ------ NORMAL SEEDING ------ 
        Book::factory(10000)->create(); 
        # Postgresql
        //1000 - 3,234.02 ms
        //10000 - 32,766.66 ms
        # Mysql
        //10000 - 285,282.44 ms
        
        //Book::factory()->count(10000)->create(); 
        # Postgresql 
        //1000 - 3,425.09 ms 
        //10000 - 33,592.32 ms 
        # Mysql
        //10000 - 300,865.45 ms

        //--------- CHUNCK SEEDING ---------
        //$books = Book::factory(10000)->make();
        //$chunks = $books->chunk(2000);

        // $chunks->each(function ($chunk) {
        //     Book::insert($chunk->toArray());
        // });
        # MYSQL
        //10000 - 384,296.40 ms

        // $books = Book::factory(10000)->make();
        // foreach (array_chunk($books->all(),2000) as $chunk) {
        //     Book::insert($chunk);
        // }
        // Da error.
    }
}
