<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingPartner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_email', 'contact_phone', 'active'];

    public function trackings()
    {
        return $this->hasMany(DeliveryTracking::class);
    }
}
