<?php

namespace Database\Seeders\Home;

use App\Models\Home\Home;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::create([
            'title'               => [
                'en' => 'Spreading the Pillars of Nonviolent Communication',
                'ar' => ''
            ],
            'subtitle'            => [
                'en' => 'Building bridges through empathy, understanding, and authentic expression. Our foundation is dedicated to creating a more peaceful world through compassionate communication.',
                'ar' => ''
            ],
            'trainings_number'    => 40,
            'trainers_number'     => 800,
            'stories_number'      => 400,
            'life_groups_members' => 285,
        ]);
    }
}
