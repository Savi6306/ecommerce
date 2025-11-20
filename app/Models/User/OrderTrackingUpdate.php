<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class OrderTrackingUpdate extends Model
{
    protected $connection = 'mysql_user';
    protected $table = 'order_tracking_updates';

    protected $fillable = [
        'order_id',
        'status',
        'message'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
