<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FoodSeeder;
use Database\Seeders\RateSeeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\SeatSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CinemaSeeder;
use Database\Seeders\CastingSeeder;
use Database\Seeders\FavoriteSeeder;
use Database\Seeders\BroadcastSeeder;
use Database\Seeders\BookSeeder;

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
            UserSeeder::class,
            CastingSeeder::class,
            MovieSeeder::class,
            SeatSeeder::class,
            CinemaSeeder::class,
            FoodSeeder::class,
            PlaySeeder::class,
            RateSeeder::class,
            RoomSeeder::class,
            BroadcastSeeder::class,
            FavoriteSeeder::class,
            SellSeeder::class,
            BookSeeder::class,
        ])
    }
}
