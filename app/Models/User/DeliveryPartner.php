<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPartner extends Model
{
    use HasFactory;
protected $connection = 'mysql_user';
    protected $fillable = ['name', 'tracking_url', 'contact_number'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
