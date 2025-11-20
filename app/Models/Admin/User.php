<?php

namespace App\Models\Admin;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // points to the main users table

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'gender', 'is_admin', 'is_active'
    ];

    /**
     * Hidden fields
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutator to automatically hash password
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function roles()
{
    return $this->belongsToMany(Role::class);
}

public function hasRole($role)
{
    return $this->roles()->where('slug', $role)->exists();
}

public function hasPermission($permission)
{
    return $this->roles()
                ->whereHas('permissions', function ($query) use ($permission) {
                    $query->where('slug', $permission);
                })->exists();
}

}
