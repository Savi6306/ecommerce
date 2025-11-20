<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // 👑 1 Admin User
        User::factory()->admin()->create([
            'name' => 'Main Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'gender' => 'female',
        ]);

        // 🧑‍💼 Multiple Sellers (5)
        User::factory()->count(5)->seller()->create()->each(function ($seller, $i) {
            $seller->update([
                'name' => "Seller {$i}",
                'email' => "seller{$i}@example.com",
                'password' => Hash::make('seller123'),
                'gender' => 'male',
            ]);
        });

        // 🧍‍♀️ Multiple Customers (10)
        User::factory()->count(10)->create()->each(function ($customer, $i) {
            $customer->update([
                'name' => "Customer {$i}",
                'email' => "customer{$i}@example.com",
                'password' => Hash::make('user123'),
                'roles' => 'customer',
                'gender' => 'female',
            ]);
        });

        // 💪 Optional: Combined Admin + Seller
        User::factory()->adminSeller()->create([
            'name' => 'Savita AdminSeller',
            'email' => 'savita@adminseller.com',
            'password' => Hash::make('savita123'),
            'gender' => 'female',
        ]);
    }
}
