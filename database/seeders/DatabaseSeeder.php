<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Subject;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        User::factory(10)->create();

        //Teacher::factory()->count(10)->create()->each(function(Teacher $teacher) {
                                //     Subject::factory()
                                //         ->count(2)
                                //         ->create([
                                //             'teacher_id' => $teacher->id,
                                //         ]);
                                // });

            
            
            
        //Teacher::factory(10)->create();
        Teacher::factory()->has(Subject::factory()->count(5))->count(10)->create();
        // Adding ->count(5) will create 5 tasks per user
            
        Subject::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Subject::factory()->create([
            'subject' => 'art & drawing',
            'subImage' => 'testexamplecom',
        ]);

        

    }
}
// public function run()
// {
//     factory(App\User::class, 50)->create()->each(function ($u) {
//         $u->roles()->save(factory(App\Role::class)->make());
//     });

//     factory(App\Role::class, 20)->create()->each(function ($u) {
//         $u->users()->save(factory(App\User::class)->make());
//     });
// }