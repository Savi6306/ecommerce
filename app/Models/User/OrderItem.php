<?php 

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // ✔ User DB
    protected $connection = 'mysql_user';

    // ✔ Correct table (your DB already uses order_items)
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    // 🔥 Correct Product model path
    // User DB product is: App\Models\User\Product
    // or Seller DB product is: App\Models\Seller\Product
    // Your structure matches SELLER product
    public function product()
    {
        return $this->belongsTo(\App\Models\Seller\Product::class, 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
