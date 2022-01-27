<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class genreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genre =  ["action","crime","thriller","war","romance","drama","comedy","documentary","horror"];

        return [
            "name"=>$this->faker->unique()->randomElement($genre)
        ];
    }
}
