<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'abbreviation' => $this->faker->countryISOAlpha3(),
            'name' => $this->faker->country(),
        ];
    }
}
