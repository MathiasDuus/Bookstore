<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class storeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $address = \App\Models\address::pluck('id')->toArray();
        return [
            'address_id' => $this->faker->randomElement($address),
            'name' => $this->faker->colorName(),
        ];
    }
}
