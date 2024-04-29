<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_created()
    {
        $response = $this->post('/books', [
            'title' => 'Test Book',
            'authors' => 'Test Author',
            'released_at' => '2022-01-01',
            'pages' => 100,
            'isbn' => '1234567890',
            'description' => 'Test Description',
            'genres' => [1], // assuming a genre with id 1 exists
            'in_stock' => 10,
        ]);

        $response->assertStatus(302); // assuming you're redirecting after a successful creation

        $this->assertDatabaseHas('books', [
            'title' => 'Test Book',
            'authors' => 'Test Author',
            'released_at' => '2022-01-01',
            'pages' => 100,
            'isbn' => '1234567890',
            'description' => 'Test Description',
            'in_stock' => 10,
        ]);
    }
}
