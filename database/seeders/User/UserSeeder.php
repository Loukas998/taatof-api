<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name'   => 'admin',
                'middle_name'  => 'admin',
                'last_name'    => 'admin',
                'email'        => 'admin@test.com',
                'phone_number' => '0999999994',
                'password'     => Hash::make('password'),
                'role'         => 'admin',
                'auditor_id'  => null,
                'project_id'   => null
            ],

            [
                'first_name'   => 'media',
                'middle_name'  => 'media',
                'last_name'    => 'media',
                'email'        => 'media@test.com',
                'phone_number' => '0999999998',
                'password'     => Hash::make('password'),
                'role'         => 'media',
                'auditor_id'  => null,
                'project_id'   => null
            ],

            [
                'first_name'   => 'auditor1',
                'middle_name'  => 'auditor1',
                'last_name'    => 'auditor1',
                'email'        => 'auditor1@test.com',
                'phone_number' => '0999999993',
                'password'     => Hash::make('password'),
                'role'         => 'auditor',
                'auditor_id'  => null,
                'project_id'   => null
            ],

            [
                'first_name'   => 'auditor2',
                'middle_name'  => 'auditor2',
                'last_name'    => 'auditor2',
                'email'        => 'auditor2@test.com',
                'phone_number' => '0999999995',
                'password'     => Hash::make('password'),
                'role'         => 'auditor',
                'auditor_id'   => null,
                'project_id'   => null
            ],

            [
                'first_name'   => 'participant1',
                'middle_name'  => 'participant1',
                'last_name'    => 'participant1',
                'email'        => 'participant1@test.com',
                'phone_number' => '0999999992',
                'password'     => Hash::make('password'),
                'role'         => 'participant',
                'auditor_id'   => 3,
                'project_id'   => 1
            ],

            [
                'first_name'   => 'participant2',
                'middle_name'  => 'participant2',
                'last_name'    => 'participant2',
                'email'        => 'participant2@test.com',
                'phone_number' => '0999999991',
                'password'     => Hash::make('password'),
                'role'         => 'participant',
                'auditor_id'   => 4,
                'project_id'   => 1
            ],
        ];

        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
