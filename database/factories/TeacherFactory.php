<?php

namespace Database\Factories;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'fb' => fake()->safeEmail(),
            'insta' => fake()->safeEmail(),
            'twitter' => fake()->safeEmail(),
            'image' => fake()->imageUrl(800, 600),
            'active' => fake()->numberBetween($min = 1, $max = 0),

        ];
    }
}
