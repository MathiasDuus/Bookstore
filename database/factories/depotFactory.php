<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class depotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $book = \App\Models\book::pluck('id')->toArray();
        $store = \App\Models\store::pluck('id')->toArray();
        return [
            'book_id' => $this->faker->randomElement($book),
            'amount' => rand(1,50),
            'store_id' => $this->faker->randomElement($store),
        ];
    }
}
