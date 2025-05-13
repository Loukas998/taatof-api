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
                'employee_id'  => null,
                'project_id'   => null
            ],

            [
                'first_name'   => 'employee1',
                'middle_name'  => 'employee1',
                'last_name'    => 'employee1',
                'email'        => 'employee1@test.com',
                'phone_number' => '0999999993',
                'password'     => Hash::make('password'),
                'role'         => 'employee',
                'employee_id'  => null,
                'project_id'   => null
            ],

            [
                'first_name'   => 'employee2',
                'middle_name'  => 'employee2',
                'last_name'    => 'employee2',
                'email'        => 'employee2@test.com',
                'phone_number' => '0999999995',
                'password'     => Hash::make('password'),
                'role'         => 'employee',
                'employee_id'  => null,
                'project_id'   => null
            ],

            [
                'first_name'   => 'participant1',
                'middle_name'  => 'participant1',
                'last_name'    => 'participant1',
                'email'        => 'participant1@test.com',
                'phone_number' => '0999999992',
                'password'     => Hash::make('password'),
                'role'         => 'employee',
                'employee_id'  => 2,
                'project_id'   => 1
            ],

            [
                'first_name'   => 'participant2',
                'middle_name'  => 'participant2',
                'last_name'    => 'participant2',
                'email'        => 'participant2@test.com',
                'phone_number' => '0999999991',
                'password'     => Hash::make('password'),
                'role'         => 'employee',
                'employee_id'  => 3,
                'project_id'   => 1
            ],
        ];

        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
