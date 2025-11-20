<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'provider',
        'active',
        'config',
    ];

    protected $casts = [
        'config' => 'array',
        'active' => 'boolean',
    ];
}
