<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',       // e.g. 'discount', 'coupon', 'banner'
        'discount',
        'coupon_code',
        'start_date',
        'end_date',
        'banner',
        'status',
    ];
}
