<?php

namespace Database\Seeders\Project;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title'                => [
                    'en' => 'Project 1',
                    'ar' => ''
                ],
                'home_description'     => [
                    'en' => 'Description for Project 1', 
                    'ar' => ''
                ],
                'detailed_description' => [
                    'en' => 'Detailed description for Project 1',
                    'ar' => ''
                ],
            ],
            [
                'title'                => [
                    'en' => 'Project 2',
                    'ar' => ''
                ],
                'home_description'     => [
                    'en' => 'Description for Project 2', 
                    'ar' => ''
                ],
                'detailed_description' => [
                    'en' => 'Detailed description for Project 2',
                    'ar' => ''
                ],
            ],
        ];

        foreach ($projects as $project) {
            \App\Models\Project\Project::create($project);
        }
    }
}
