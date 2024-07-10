<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_id' => fake()->randomDigit(),
            'teacher_id' => fake()->randomDigit(),
            'price' => fake()->randomDigit(),
            'ageGroup' => fake()->randomDigit(),
            'start' => fake()->randomDigit(),
            'end' => fake()->randomDigit(),
            'capacity' => fake()->randomDigit(),
            'active' => rand(0, 1), //doesnt take fake
        ];
    }
}
