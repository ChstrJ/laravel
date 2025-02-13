<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_public' => fake()->boolean(),
            'name' => fake()->text(),
            'description' => fake()->text(100),
            'number_of_days' => fake()->numberBetween(1, 5)
        ];
    }
}
