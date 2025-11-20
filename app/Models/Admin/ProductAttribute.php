<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug', 'status','product_id', 'attribute_name', 'attribute_value'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
