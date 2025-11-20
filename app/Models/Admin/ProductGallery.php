<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image',
        'is_featured',
        'position',
    ];

    public function product()
    {
        return $this->belongsTo(VendorProduct::class, 'product_id');
    }
}
