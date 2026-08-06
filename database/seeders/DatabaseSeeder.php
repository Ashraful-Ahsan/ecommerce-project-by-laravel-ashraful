<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create or update the admin account with the requested credentials.
        User::updateOrCreate(
            ['email' => 'ahsanxt@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('Ahsan12@'),
                'usertype' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ]
        );

        $this->call(TestimonialSeeder::class);
    }
}
