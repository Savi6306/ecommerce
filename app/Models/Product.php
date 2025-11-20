<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id', 'name', 'description', 'sku', 'price', 
        'stock', 'status', 'is_featured', 'image'
    ];

    // Relation with Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    // Relation with Category (optional)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
{
    return $this->belongsTo(Brand::class);
}
 public function attribute()
{
    return $this->belongsTo(Attribute::class);
}

}
