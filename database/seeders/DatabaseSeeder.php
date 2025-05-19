<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Category\CategorySeeder;
use Database\Seeders\ContactUs\ContactUsSeeder;
use Database\Seeders\Home\HomeSeeder;
use Database\Seeders\Project\ProjectSeeder;
use Database\Seeders\State\StateSeeder;
use Database\Seeders\User\UserSeeder;
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
            StateSeeder::class,
            ProjectSeeder::class,
            CategorySeeder::class,
            HomeSeeder::class,
            UserSeeder::class,
            ContactUsSeeder::class
        ]);
    }
}
