<?php
namespace App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;

class Product extends Model
{
    use HasFactory;
protected $connection = 'mysql';
protected $table = 'products';

    protected $fillable = [
        'seller_id', 'category_id', 'brand_id', 'name', 'slug', 'description',
    'sku', 'price', 'discount_price', 'stock', 'type', 'is_featured', 'status', 'image'
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
