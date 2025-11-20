<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seller;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'amount',
        'payment_method',
        'status',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function refunds()
    {
        return $this->hasMany(Refund::class);
    }
}
