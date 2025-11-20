<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

       
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@meshoo.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin user created successfully!');
         $this->call(AdminUserSeeder::class);
    }
    

    }

