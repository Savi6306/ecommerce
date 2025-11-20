<?php 
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
   // protected $connection = 'mysql_user';
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function product()
{
    return $this->belongsTo(\App\Models\Seller\Product::class, 'product_id');
}

}
