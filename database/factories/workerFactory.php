<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class workerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $store = \App\Models\store::pluck('id')->toArray();
        $department = \App\Models\department::pluck('id')->toArray();
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'mail' => $this->faker->safeEmail(),
            'store_id' => $this->faker->randomElement($store),
            'department_id' => $this->faker->randomElement($department),
        ];
    }
}
