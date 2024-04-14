<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Genre;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // Get all genre ids
        $genreIds = Genre::all()->pluck('id')->toArray();

        // Create 20 books
        Book::factory()->count(20)->create()->each(function ($book) use ($genreIds, $faker) {
            // Attach random genres to each book
            $book->genres()->attach($faker->randomElements($genreIds, rand(1, 4)));
        });
    }
}
