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
            [
                'name' => [
                    'en' => 'Damascus',
                    'ar' => 'دمشق'
                ],
            ],
            [
                'name' => [
                    'ar' => 'ريف دمشق',
                    'en' => 'Rif Dimashq'
                ]
            ],
            [
                'name' => [
                    'ar' => 'طرطوس',
                    'en' => 'Tartous'
                ]
            ],
            [
                'name' => [
                    'ar' => 'اللاذقية',
                    'en' => 'Lattakia'
                ]
            ],
            [
                'name' => [
                    'ar' => 'حماة',
                    'en' => 'Hama'
                ]
            ],
            [
                'name' => [
                    'ar' => 'حمص',
                    'en' => 'Homs'
                ]
            ],
            [
                'name' => [
                    'ar' => 'القنيطرة',
                    'en' => 'Al Qunaitira'
                ]
            ],
            [
                'name' => [
                    'en' => 'Daraa',
                    'ar' => 'درعا'
                ]
            ],
            [
                'name' => [
                    'en' => 'Al Swaidaa',
                    'ar' => 'السويداء'
                ]
            ],
            [
                'name' => [
                    'en' => 'Aleppo',
                    'ar' => 'حلب'
                ]
            ],
            [
                'name' => [
                    'en' => 'Deir Al Zor',
                    'ar' => 'ديرالزور'
                ]
            ],
            [
                'name' => [
                    'en' => 'Al Hasaka',
                    'ar' => 'الحسكة'
                ]
            ],
            [
                'name' => [
                    'en' => 'Al Raqqa',
                    'ar' => 'الرقة'
                ]
            ],
            [
                'name' => [
                    'en' => 'Idlib',
                    'ar' => 'إدلب'
                ]
            ],
        ];

        foreach ($states as $state) {
            \App\Models\State\State::create($state);
        }
    }
}
