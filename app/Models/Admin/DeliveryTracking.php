<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'shipping_partner_id',
        'tracking_number',
        'current_status',
        'current_location',
        'expected_delivery_date',
        'remarks',
    ];

    /**
     * 🚚 Relation: Shipping Partner
     */
    public function partner()
    {
        return $this->belongsTo(ShippingPartner::class, 'shipping_partner_id');
    }

    /**
     * 🧾 Relation: Order
     */
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    /**
     * 🔁 Relation: Shipping Updates
     */
    public function updates()
{
    return $this->hasMany(ShippingUpdate::class, 'delivery_tracking_id');
}

}
