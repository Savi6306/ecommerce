<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\InHouseProduct as Product;
class InHouseProduct extends Model
{
    use HasFactory;
   protected $table = 'in_house_products';
    protected $fillable = [
    
        'name',
        'sku',
        'price',
        'description',
       'image',
    ];
    public function orders()
{
    return $this->belongsToMany(\App\Models\Order::class, 'order_items', 'product_id', 'order_id');
}

}
