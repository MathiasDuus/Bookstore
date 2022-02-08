<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class addressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postal = \App\Models\postal::pluck('id')->toArray();
        return [
            'postal_id' => $this->faker->randomElement($postal),
            'street' => $this->faker->streetAddress(),
        ];
    }
}
