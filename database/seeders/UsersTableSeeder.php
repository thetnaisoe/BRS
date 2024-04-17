<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create(); // Creates 10 readers

        User::factory()->create([
            'name' => 'Reader',
            'email' => 'reader@brs.com',
            'password' => Hash::make('password'),
            'is_librarian' => false,
        ]);

        User::factory()->create([
            'name' => 'Librarian',
            'email' => 'librarian@brs.com',
            'password' => Hash::make('password'),
            'is_librarian' => true,
        ]);
    }
}