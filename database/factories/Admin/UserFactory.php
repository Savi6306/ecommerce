<?php

namespace Database\Factories\Admin;


use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'role' => 'customer',
            'gender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
     public function admin()
    {
         return $this->state(fn() => ['role' => 'admin', 'is_admin' => true]);
    }

    public function seller()
    {
        return $this->state(fn() => ['roles' => 'seller']);
    }

   public function adminSeller()
    {
        return $this->state(fn() => ['role' => 'admin,seller', 'is_admin' => true]);
    }
}

