<?php

namespace Database\Seeders;

use App\Models\CrewMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrewMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CrewMember::create([
            'name' => 'Douglas Hurley',
            'job' => 'Commander',
            'bio' => "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.",
            'image_png' => 'seed/image-douglas-hurley.png',
            'image_webp' => 'seed/image-douglas-hurley.webp'
        ]);

        CrewMember::create([
            'name' => 'Mark Shuttleworth',
            'job' => 'Mission Specialist',
            'bio' => "Mark Richard Shuttleworth is the founder and CEO of Canonical, the company behind the Linux-based Ubuntu operating system. Shuttleworth became the first South African to travel to space as a space tourist.",
            'image_png' => 'seed/image-mark-shuttleworth.png',
            'image_webp' => 'seed/image-mark-shuttleworth.webp'
        ]);

        CrewMember::create([
            'name' => 'Victor Glover',
            'job' => 'Pilot',
            'bio' => "Pilot on the first operational flight of the SpaceX Crew Dragon to the International Space Station. Glover is a commander in the U.S. Navy where he pilots an F/A-18.He was a crew member of Expedition 64, and served as a station systems flight engineer.",
            'image_png' => 'seed/image-victor-glover.png',
            'image_webp' => 'seed/image-victor-glover.webp'
        ]);

        CrewMember::create([
            'name' => 'Anousheh Ansari',
            'job' => 'Flight Engineer',
            'bio' => "Anousheh Ansari is an Iranian American engineer and co-founder of Prodea Systems. Ansari was the fourth self-funded space tourist, the first self-funded woman to fly to the ISS, and the first Iranian in space.",
            'image_png' => 'seed/image-anousheh-ansari.png',
            'image_webp' => 'seed/image-anousheh-ansari.webp'
        ]);
    }
}
