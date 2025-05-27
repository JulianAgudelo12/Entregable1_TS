<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user if not already present
        $email = 'test@example.com';
        if (!DB::table('users')->where('email', $email)->exists()) {
            DB::table('users')->insert([
                'name'              => 'Test User',
                'email'             => $email,
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'is_admin'          => 0,
                'remember_token'    => null,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
            $this->command->info("Created user: {$email}");
        } else {
            $this->command->info("User already exists: {$email}, skipping.");
        }

        // Seed data from JSON
        $this->call(JsonDataSeeder::class);
    }
}
