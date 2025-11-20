<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Seeder;

class SellerDashboardSeeder extends Seeder
{
    public function run()
    {
        $seller = User::factory()->create(['role' => 'seller']);

        // Create products
        Product::factory()->count(15)->create(['seller_id' => $seller->id]);

        // Create orders for today
        Order::factory()->count(5)->create([
            'seller_id' => $seller->id,
            'status' => 'pending',
            'created_at' => now()
        ]);

        Order::factory()->count(3)->create([
            'seller_id' => $seller->id,
            'status' => 'approved',
            'created_at' => now()
        ]);

        Order::factory()->count(2)->create([
            'seller_id' => $seller->id,
            'status' => 'in_transit',
            'created_at' => now()
        ]);
    }
}
