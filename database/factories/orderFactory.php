<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class orderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $address = \App\Models\address::pluck('id')->toArray();
        $state = [
            "Order Recieved",
            "In transit",
            "Delivered"
        ];

        return [
            'address_id' => $this->faker->randomElement($address),
            'date' => $this->faker->date(),
            'status' => $this->faker->randomElement($state),
        ];
    }
}
