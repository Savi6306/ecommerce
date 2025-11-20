<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingUpdate extends Model
{
    use HasFactory;

    protected $fillable = ['delivery_tracking_id', 'status', 'location','update_time', 'remarks'];

    public function tracking()
    {
        return $this->belongsTo(DeliveryTracking::class, 'delivery_tracking_id');
    }
}
