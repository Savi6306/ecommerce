<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    protected $fillable = ['product_id', 'quantity', 'type', 'reason'];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
