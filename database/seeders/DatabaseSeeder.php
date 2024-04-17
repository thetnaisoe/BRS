<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre; 
use App\Models\Book;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\GenresTableSeeder;
use Database\Seeders\BooksTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            GenresTableSeeder::class,
            BooksTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
