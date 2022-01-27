<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class postalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $country = \App\Models\country::pluck('abbreviation')->toArray();
        return [
            'post_code' => $this->faker->postcode(),
            'country_id' => $this->faker->randomElement($country),
            'city' => $this->faker->city(),
        ];
    }
}
