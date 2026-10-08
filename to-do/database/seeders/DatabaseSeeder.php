<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
      public function run(): void
    {
        // User 1
        $user1 = User::factory()->create([
            'name' => 'test ',
            'email' => 'test@example.com',
            'password' => 'password123',

        ]);

        // User 2
        $user2 = User::factory()->create([
            'name' => 'test2',
            'email' => 'test2@example.com',
            'password' => 'password123456',

        ]);

        // User 1 -> 2 Tasks
        $user1->tasks()->createMany([
            ['title' => 'Learn Laravel',],
            ['title' => 'Build To-Do App',  ],


        ]);

        // User 2 -> 4 Tasks
        $user2->tasks()->createMany([
            ['title' => 'Study PHP', ],
            ['title' => 'Learn MySQL',],
            ['title' => 'Practice ',],
            ['title' => 'Learn Redis',],


        ]);


   
        }
}
