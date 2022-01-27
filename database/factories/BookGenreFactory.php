<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookGenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $book = \App\Models\book::pluck('id')->toArray();
        $genre = \App\Models\genre::pluck('id')->toArray();
        return [
            'book_id' => $this->faker->randomElement($book),
            'genre_id' => $this->faker->randomElement($genre),
        ];
    }
}
