<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $book = \App\Models\book::pluck('id')->toArray();
        $order = \App\Models\order::pluck('id')->toArray();
        return [
            'order_id' => $this->faker->randomElement($order),
            'book_id' => $this->faker->randomElement($book),
            'quantity' => rand(1,50),
            'price' => rand(50,1000),
        ];
    }
}
