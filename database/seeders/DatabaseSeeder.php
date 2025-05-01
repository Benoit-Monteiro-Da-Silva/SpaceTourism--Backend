<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Technology;
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
        $this->call([
            DestinationSeeder::class,
            CrewMemberSeeder::class,
            TechnologySeeder::class,
            UserSeeder::class
        ]);
    }
}
