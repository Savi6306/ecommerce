<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProductGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_product_id',
        'image',
        'is_featured',
        'position',
    ];

    public function product()
    {
        return $this->belongsTo(VendorProduct::class, 'vendor_product_id');
    }

}
