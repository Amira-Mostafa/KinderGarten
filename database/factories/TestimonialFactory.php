<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
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
            'profession' => fake()->name(),
            'comment' => fake()->word(),
            'image' => fake()->imageUrl(800, 600),
            'active' => fake()->numberBetween($min = 1, $max = 0),
        ];
    }
}
