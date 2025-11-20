<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name', 'location'];

    public function stocks()
    {
        return $this->hasMany(WarehouseStock::class);
    }
}
