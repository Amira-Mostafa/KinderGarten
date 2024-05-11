<?php

namespace Database\Factories;

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
            'profileImage' => fake()->imageUrl(800,600),
            'active'=> fake()->randomDigit(),
            
        ];
    }
}
          
