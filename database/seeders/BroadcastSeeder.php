<?php

namespace Database\Seeders;

use App\Models\Broadcast;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BroadcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Broadcast::factory(20)->create();
    }
}
