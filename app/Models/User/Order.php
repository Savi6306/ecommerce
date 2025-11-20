<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // ✔ This ensures USER DB is used
    //protected $connection = 'mysql_user';

    // ✔ Correct table name in user DB
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'address_id',
        'total',
        'promo_code',
        'discount',
        'final_total',
        'payment_method',
        'payment_status',   // 🔥 your table uses 'payment_status' not 'status'
        'status',
        'delivery_partner_id',
        'tracking_id'
    ];

    // 🔥 Correct relationship (user table = customers)
    public function user()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function statusHistories()
    {
        return $this->hasMany(OrderStatusHistory::class)->orderBy('created_at');
    }

    public function trackingUpdates()
    {
       return $this->hasMany(OrderTrackingUpdate::class)->orderBy('created_at', 'asc');
    }

    public function deliveryPartner()
    {
        return $this->belongsTo(\App\Models\User\DeliveryPartner::class);
    }
}
