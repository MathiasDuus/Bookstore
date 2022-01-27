<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class departmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dep=[
          "manager",
          "normal",
          "chef"
        ];
        return [
            'name' => $this->faker->unique()->randomElement($dep),
        ];
    }
}
