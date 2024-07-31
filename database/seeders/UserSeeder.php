<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Super Admin User',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('superadmin'),
                'role' => 'super-admin'
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ],
            [
                'name' => 'Agent User',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('agent'),
                'role' => 'agent'
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            $user->assignRole($userData['role']);
        }
    }
}
