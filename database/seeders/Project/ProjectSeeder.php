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
                'title'                => 'Project 1',
                'home_description'     => 'Description for Project 1',
                'detailed_description' => 'Detailed description for Project 1',
            ],
            [
                'title'                => 'Project 2',
                'home_description'     => 'Description for Project 2',
                'detailed_description' => 'Detailed description for Project 2',
            ],
        ];

        foreach ($projects as $project) {
            \App\Models\Project\Project::create($project);
        }
    }
}
