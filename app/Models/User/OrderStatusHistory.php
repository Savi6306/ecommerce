<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatusHistory extends Model
{
    use HasFactory;
protected $connection = 'mysql_user';
    protected $fillable = [
        'order_id',
        'status',
        'note',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
