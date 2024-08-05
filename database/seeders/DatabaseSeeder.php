<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Testimonial;
use App\Models\Classes;
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
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'admin ',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => 1111111111,
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

        Testimonial::factory(10)->create();
        Teacher::factory(10)->create();
        $teachers = Teacher::all();   // Get all the teachers attaching up to 3 random subject to each teacher
        foreach ($teachers as $teacher) {  // Populate the pivot table
            // Get two random subjects
            $subjects = Subject::inRandomOrder()->take(2)->pluck('id');
            // Attach subjects with unique preferences
            foreach ($subjects as $index => $subjectId) {
                $teacher->subjects()->attach($subjectId, [
                    'preference' => $index + 1, // Ensure unique preference
                ]);
            }
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

        Classes::factory()->create();
    }
}
