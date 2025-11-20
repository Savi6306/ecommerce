<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'seller_id', 'buyer_id', 'order_number', 'total_amount',
        'payment_status', 'payment_method', 'status',
        'shipping_address', 'billing_address', 'tracking_number',
        'tax_amount', 'discount_amount'
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', now()->toDateString());
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
    public function items()
{
    return $this->hasMany(OrderItem::class);
}
}
