<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $styleIndex = 0;

        $styles = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
        $names = ['Fantasy', 'Science Fiction', 'Mystery', 'Romance', 'Thriller', 'Biography', 'Non-fiction', 'Historical', 'Young Adult', 'Children'];

        $style = $styles[$styleIndex % count($styles)];
        $styleIndex++;

        return [
            'name' => $this->faker->unique()->randomElement($names),
            'style' => $style,
        ];
    }
}
