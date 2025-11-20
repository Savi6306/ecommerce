<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // ✔ USER DATABASE
    protected $connection = 'mysql_user';

    // ✔ CORRECT TABLE
    protected $table = 'payments';

    // ✔ FILLABLE COLUMNS
    protected $fillable = [
        'user_id',
        'method',
        'details',
        'amount',
        'status'
    ];

    // ✔ IMPORTANT FIX:
    // User table is "customers", NOT "users"
    public function user()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    // OPTIONAL: if you want to link payment to order also
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
