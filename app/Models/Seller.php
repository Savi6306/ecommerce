<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Admin\VendorProduct;


class Seller extends Authenticatable
{
    use Notifiable;

    protected $guard = 'seller';
    protected $fillable = [
        'name','store_name','email','phone','password','profile_photo','address','business_id','rating'
    ];

    protected $hidden = ['password'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
     // A seller can have many vendor products
    public function vendorProducts()
    {
        return $this->hasMany(VendorProduct::class, 'vendor_id');
    }

}
