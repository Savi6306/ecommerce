<?php

namespace App\Models\User;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    // 👇 This line tells Laravel to use your second DB connection
    protected $connection = 'mysql_user';  // ✅ Use 'laravel' database

    protected $table = 'customers';
protected $guard = 'customers';
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'password',
        'gender',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $incrementing = true;   // ✅ Ensures auto increment ID works
    protected $keyType = 'int';

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}