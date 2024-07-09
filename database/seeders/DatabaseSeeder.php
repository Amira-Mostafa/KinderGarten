<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Testimonial;
use Database\Seeders\factory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // Populate subjects
        // Subject::factory(10)->create();

        // Populate teachers
        Testimonial::factory(10)->create();
        Teacher::factory(10)->create();

        // Get all the teachers attaching up to 3 random subject to each teacher
        $teachers = Teacher::all();

        // Populate the pivot table



        User::factory()->create([
            'name' => 'admin ',
            'email' => 'test@example.com',
            'is_admin' => 1,
        ]);

        Subject::factory()->create(
            [
                'subject' => 'color mangament',
                'image' => 'testexamplecom',
            ],
        );
        Subject::factory()->create(
            [
                'subject' => 'Athelics & Dance',
                'image' => 'testexamplecom',
            ],
        );
        Subject::factory()->create(
            [
                'subject' => 'Art & Drawing',
                'image' => 'testexamplecom',
            ],
        );
        Subject::factory()->create(
            [
                'subject' => 'Language & Speaking',
                'image' => 'testexamplecom',
            ],
        );
        Subject::factory()->create(
            [
                'subject' => 'Relision & History',
                'image' => 'testexamplecom',
            ],
        );
        Subject::factory()->create(
            [
                'subject' => 'General Knowledge',
                'image' => 'testexamplecom',
            ],
        );
        Subject::factory()->create(
            [
                'subject' => 'Field Trips',
                'image' => 'testexamplecom',
            ],
        );


        foreach ($teachers as $teacher) {
            $teacher->subjects()->attach(
                Subject::inRandomOrder()->take(2)->pluck('id'),
                [
                    'preference' => fake()->numberBetween($min = 1, $max = 2),
                    'price' => fake()->randomDigit(),
                    'ageGroup' => fake()->unique()->randomDigit(),
                    'time' => fake()->randomDigit(),
                    'capacity' => fake()->randomDigit(),
                    'active' => rand(0, 1), //doesnt take fake
                ]
            );
        }

        Testimonial::factory()->create(
            [
                'name' => 'amira mostafa',
                'profession' => 'architect',
                'comment' => 'Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                eirmod sit. Ipsum diam justo sed rebum vero dolor duo.',
                'active' => fake()->numberBetween($min = 1, $max = 0),

            ]
        );
    }
}
