<?php
namespace App\Models\Admin;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use Notifiable;

    // Allow mass assignment on these fields
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // if you are storing role like 'admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
