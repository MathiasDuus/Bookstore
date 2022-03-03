<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class employeeFactory extends Factory
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
            'email' => $this->faker->unique()->email(),
            'store_id' => $this->faker->randomElement($store),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'department_id' => $this->faker->randomElement($department),
        ];
    }
}
