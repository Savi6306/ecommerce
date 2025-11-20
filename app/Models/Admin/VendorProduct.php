<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Seller;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Admin\Attribute;

class VendorProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'name',
        'slug',
        'sku',
        'category_id',
        'brand_id',
        'price',
        'discount_price',
        'stock',
        'type',
        'is_featured',
        'status',
        'description',
        'image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'stock' => 'integer',
        'is_featured' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }

    // Relationships
    public function vendor()
    {
        return $this->belongsTo(Seller::class, 'vendor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'vendor_product_attributes')
                    ->withPivot('value')
                    ->withTimestamps();
    }
  // app/Models/Admin/VendorProduct.php
public function images()
{
    return $this->hasMany(ProductImage::class, 'product_id');
}

}

