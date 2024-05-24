<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use App\Models\User;
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

        User::factory()->create([
             'name' => 'Admin',
             'lastName' => 'Admin',
             'email' => 'admin@admin.ma',
             'password' => bcrypt('admin123'),
             'role' => 'admin',
         ]);

        $categories = [
            'MUSIC',
            'PERFORMING & VISUAL ARTS',
            'TRIPS',
            'HEALTH',
            'VIDEO GAMES',
            'SEMINAR',
            'FOOD & DRINK',
            'FESTIVALS',
        ];

        foreach ($categories as $category) {
            EventCategory::factory()->create(['name' => $category]);
        }

    }
}
