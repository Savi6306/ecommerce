<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image',
        'image_path',
        'is_featured',
        'position'
    ];

    public function product()
    {
        return $this->belongsTo(VendorProduct::class, 'vendor_product_id');
    }

}