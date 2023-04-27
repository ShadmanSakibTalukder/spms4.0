<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'user_id' => '1000',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'email_verified_at' =>  now(),
            'user_type' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'faculty',
            'user_id' => '2000',
            'email' => 'faculty@gmail.com',
            'password' => Hash::make('faculty'),
            'user_type' => 'faculty',
            'email_verified_at' =>  now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'student',
            'user_id' => '3000',
            'email' => 'student@gmail.com',
            'password' => Hash::make('student'),
            'user_type' => 'student',
            'email_verified_at' =>  now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
