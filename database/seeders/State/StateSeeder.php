<?php

namespace Database\Seeders\State;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'دمشق',],
            ['name' => 'ريف دمشق'],
            ['name' => 'طرطوس'],
            ['name' => 'اللاذقية'],
            ['name' => 'حماة'],
            ['name' => 'حمص'],
            ['name' => 'القنيطرة'],
            ['name' => 'درعا'],
            ['name' => 'السويداء'],
            ['name' => 'حلب'],
            ['name' => 'ديرالزور'],
            ['name' => 'الحسكة'],
            ['name' => 'الرقة'],
            ['name' => 'إدلب'],
        ];

        foreach ($states as $state) {
            \App\Models\State\State::create($state);
        }
    }
}
