<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'name' => "Moon",
            'distance' => '384,400 km',
            'travel_time' => '3 days',
            'image_png' => 'seed/image-moon.png',
            'image_webp' => 'seed/image-moon.webp',
            'description' => "See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites."
        ]);

        Destination::create([
            'name' => "Mars",
            'distance' => '225 mil. km',
            'travel_time' => '9 months',
            'image_png' => 'seed/image-mars.png',
            'image_webp' => 'seed/image-mars.webp',
            'description' => "Don’t forget to pack your hiking boots. You’ll need them to tackle Olympus Mons, the tallest planetary mountain in our solar system. It’s two and a half times the size of Everest!"
        ]);

        Destination::create([
            'name' => 'Europa',
            'distance' => '628 mil. km',
            'travel_time' => '3 years',
            'image_png' => 'seed/image-europa.png',
            'image_webp' => 'seed/image-europa.webp',
            'description' => "The smallest of the four Galilean moons orbiting Jupiter, Europa is a winter lover’s dream. With an icy surface, it’s perfect for a bit of ice skating, curling, hockey, or simple relaxation in your snug wintery cabin."
        ]);

        Destination::create([
            'name' => 'Titan',
            'distance' => '1.6 bil. km',
            'travel_time' => '7 years',
            'image_png' => 'seed/image-titan.png',
            'image_webp' => 'seed/image-titan.webp',
            'description' => "The only moon known to have a dense atmosphere other than Earth, Titan is a home away from home (just a few hundred degrees colder!). As a bonus, you get striking views of the Rings of Saturn."
        ]);
    }
}
