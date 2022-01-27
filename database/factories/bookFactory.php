<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class bookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $author = \App\Models\author::pluck('id')->toArray();
        $publisher = \App\Models\publisher::pluck('id')->toArray();
        return [
            'name' => $this->faker->domainName(),
            'author_id' => $this->faker->randomElement($author),
            'publisher_id' => $this->faker->randomElement($publisher),
            'price' => rand(50,1000),
            'release_date' => $this->faker->date(),
            'pages' => rand(1,500),
        ];
    }
}
