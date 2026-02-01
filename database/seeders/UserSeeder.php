<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Guwanç',
            'email' => 'guwanc@mizone.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Mi Zone',
            'email' => 'mizone@mizone.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'Asus',
            'email' => 'asus@mizone.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@mizone.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'Franks',
            'email' => 'franks@mizone.com',
            'password' => bcrypt('123456'),
        ]);
    }
}