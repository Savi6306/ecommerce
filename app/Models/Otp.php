<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'otp',          // ✅ fixed column name
        'type',         // general / forgot_password (optional)
        'expires_at',
        'is_used',
        'attempts',     // optional if you use it
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_used' => 'boolean',
    ];

    /**
     * Scope to get valid OTP
     */
    public function scopeValid($query, $email, $otp, $type = 'general')
    {
        return $query->where('email', $email)
                     ->where('otp', $otp)       // ✅ fixed column name
                     ->where('type', $type)
                     ->where('is_used', false)
                     ->where('expires_at', '>', now());
    }

    /**
     * Mark this OTP as used
     */
    public function markAsUsed()
    {
        $this->is_used = true;
        $this->save();
    }
}
