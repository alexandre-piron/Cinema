<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FoodSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CinemaSeeder;
use Database\Seeders\CastingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory(10)->create();
        $this->call([
            CinemaSeeder::class,
            FoodSeeder::class,
            UserSeeder::class,
            CastingSeeder::class,
            MovieSeeder::class,
            PlaySeeder::class,
        ])
    }
}
